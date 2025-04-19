<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Components\ColorPicker;
use Filament\Notifications\Notification;
use Filament\Support\Exceptions\Halt;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\Alignment;
use Illuminate\Support\HtmlString;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class Appearance extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    #[Locked]
    public ?User $record = null;

    public function mount(): void
    {
        $this->data = [
            'name' => 'Starship',
        ];
        $this->record = auth()->user();
        $data = $this->record->attributesToArray();
        $this->form->fill($data);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
            ])
            ->columns(2)
            ->statePath('data');
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $this->record->update($data);

        } catch (Halt $exception) {
            return;
        }

        $this->getSavedNotification()?->send();
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title(__('filament-panels::pages/tenancy/edit-tenant-profile.notifications.saved.title'));
    }

    public function render()
    {
        return view('livewire.settings.appearance');
    }
}
