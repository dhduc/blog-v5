<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Form;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Filament\Forms\Components\Tabs;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;
use function Filament\authorize;

class Settings extends Page
{
    use InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.settings';

    protected static ?int $navigationSort = 10;

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

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Save'))
                ->submit('save')
                ->keyBindings(['mod+s']),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->activeTab(1)
                    ->persistTabInQueryString()
//                    ->contained(false)
                    ->tabs([
                        Tabs\Tab::make('Appearance')
                            ->icon('heroicon-o-paint-brush')
                            ->schema([
                                ViewField::make('')
                                    ->hiddenLabel()
                                    ->view('filament.pages.settings.appearance'),
                            ]),
                        Tabs\Tab::make('Site Info')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                // ...
                            ]),
                        Tabs\Tab::make('Profile')
                            ->icon('heroicon-o-user')
                            ->schema([
                                // ...
                            ]),
                        Tabs\Tab::make('Social Media')
                            ->icon('heroicon-o-user')
                            ->schema([
                                // ...
                            ]),
                        Tabs\Tab::make('Integration')
                            ->icon('heroicon-o-inbox')
                            ->schema([
                                // ...
                            ]),
                        Tabs\Tab::make('SEO')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                // ...
                            ]),
                        Tabs\Tab::make('Languages')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                // ...
                            ]),
                    ])
            ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::pages/tenancy/edit-tenant-profile.form.actions.save.label'))
                ->submit('save')
                ->keyBindings(['mod+s']),
        ];
    }
}
