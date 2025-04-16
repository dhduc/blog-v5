<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Support\Exceptions\Halt;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Locked;
use Filament\Facades\Filament;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Filament\Support\Enums\MaxWidth;

use function Filament\authorize;

class Simple extends Page
{
    use InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Simple';

    protected static ?string $navigationGroup = 'Others';

    protected static ?string $slug = 'page/simple';

    protected ?string $heading = 'Simple Page';

    protected ?string $subheading = 'Custom Simple Subheading';

    protected static ?int $navigationSort = 0;

    protected static string $view = 'filament.pages.simple';

    public function getTitle(): string | Htmlable
    {
        return __('Custom Simple Title');
    }

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }

    public ?array $data = [];

    #[Locked]
    public ?User $record = null;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    public function mount(): void
    {
        $this->record = User::firstOrCreate([
        ]);

        abort_unless(static::canView($this->record), 404);

        $this->fillForm();
    }

    public static function canView(Model $record): bool
    {
        try {
            return authorize('update', $record)->allowed();
        } catch (AuthorizationException $exception) {
            return $exception->toResponse()->allowed();
        }
    }

    public static function canAccess(): bool
    {
        return auth()->user()->id;
    }

    public function fillForm(): void
    {
        $data = $this->record->attributesToArray();

        $data = $this->mutateFormDataBeforeFill($data);

        $this->form->fill($data);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $data;
    }

    protected function getForms(): array
    {
        return [
            'form',
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getFormSection(),
            ])
            ->model($this->record)
            ->statePath('data')
            ->operation('edit');
    }

    protected function getFormSection(): Component
    {
        return Section::make('Profile')
            ->description('Some public information about you')
            ->collapsible(true)
            ->schema([
                Group::make()
                ->schema([
                    TextInput::make('name')
                        ->placeholder(__('Your name'))
                        ->required(),
                    MarkdownEditor::make('about')
                        ->placeholder(__('About me'))
                        ->columnSpanFull()
                        ->required(false),

                ])->columns(2),
            ])->columns(1);
    }

    /**
     * @return array<Action | ActionGroup>
     */
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::pages/tenancy/edit-tenant-profile.form.actions.save.label'))
                ->submit('save')
                ->keyBindings(['mod+s']),
            Action::make('reset')
                ->button()
                ->outlined()
                ->action(function () {
                    //$this->form->fill();
                    $this->fillForm();
                })
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            $data = $this->mutateFormDataBeforeSave($data);

            $this->handleRecordUpdate($this->record, $data);

        } catch (Halt $exception) {
            return;
        }

        $this->getSavedNotification()?->send();

        if ($redirectUrl = $this->getRedirectUrl()) {
            $this->redirect($redirectUrl);
        }
    }

    protected function handleRecordUpdate(User $record, array $data): User
    {
        $record->update($data);

        return $record;
    }

    protected function getSavedNotification(): ?Notification
    {
        $title = $this->getSavedNotificationTitle();

        if (blank($title)) {
            return null;
        }

        return Notification::make()
            ->success()
            ->title($this->getSavedNotificationTitle());
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return __('filament-panels::pages/tenancy/edit-tenant-profile.notifications.saved.title');
    }

    protected function getRedirectUrl(): ?string
    {
        return null;
    }
}
