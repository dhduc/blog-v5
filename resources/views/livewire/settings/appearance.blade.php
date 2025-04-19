<div>
    <form wire:submit="create">
        {{ $this->form }}

        <div class="fi-form-actions mt-6">
            <x-filament::button icon="heroicon-m-sparkles" wire:click="save">
                Save
            </x-filament::button>
        </div>
    </form>

    <x-filament-actions::modals />
</div>
