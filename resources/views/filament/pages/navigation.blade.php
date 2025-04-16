<x-filament::page>
    <x-filament-panels::form wire:submit="submit">
        {{ $this->form }}

        <div class="text-left">
            <x-filament::button type="submit" form="submit" class="align-right">
                {{ __("Submit") }}
            </x-filament::button>
        </div>
    </x-filament-panels::form>
</x-filament::page>
