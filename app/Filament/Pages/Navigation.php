<?php

namespace App\Filament\Pages;

use App\Models\Navigation as NavigationModel;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;
use Filament\Infolists\Infolist;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Filament\Forms;

class Navigation extends Page implements HasForms, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static string $view = 'filament.pages.navigation';

    protected ?string $heading = 'Navigation';

    protected ?string $subheading = 'Build the customize menu navigation';

    protected static ?string $slug = 'navigation';

    protected static ?string $navigationGroup = 'Others';

    protected static ?int $navigationSort = 10;

    public $navigation;

    #[Locked]
    public $record = [];

    public function mount()
    {
        $tenant = Filament::getTenant();
        $this->record = NavigationModel::all()->toArray();
        $this->form->fill([
            'navigation' => $this->record,
        ]);
    }

    protected function getFormSchema(): array
    {
        $icons = [];
        return [
            Section::make('')
                ->schema([
                    Repeater::make('navigation')
                        ->label('Header menu')
                        ->schema([
                            Select::make('type')
                                ->label('')
                                ->columnSpan(2)
                                ->options($icons)
                                ->prefixIcon('heroicon-m-globe-alt'),
                            TextInput::make('text')
                                ->label('')
                                ->placeHolder('Text')
                                ->columnSpan(2)
                                ->required(false),
                            TextInput::make('url')
                                ->label('')
                                ->placeHolder('URL')
                                ->columnSpan(2)
                                ->url(false)
                                ->required(false),
                        ])
                        ->addActionLabel('Add a nav item')
                        ->reorderableWithButtons()
                        ->collapsible()
                        ->columns(6)
                ]),
        ];
    }

    public function submit()
    {
        $this->form->getState();

        $navigation = array_map(function ($item) {
            return $item;
        }, $this->navigation);

        $this->record->update([
            'data' => $navigation
        ]);

        setting('menu.data', true);

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }
}
