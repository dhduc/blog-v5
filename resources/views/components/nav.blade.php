<nav {{ $attributes->class('flex items-center gap-6 md:gap-8 font-normal text-xs') }}>
    <x-logo />

    <div class="flex-grow"></div>

    <a
        wire:navigate
        href="{{ route('home') }}"
        @class([
            'transition-colors hover:text-blue-600',
            'text-blue-600' => request()->routeIs('home'),
        ])"
    >
        @if (request()->routeIs('home'))
            <x-heroicon-s-home class="mx-auto size-6 md:size-7" />
        @else
            <x-heroicon-o-home class="mx-auto size-6 md:size-7" />
        @endif

        Home
    </a>

    <a
        wire:navigate
        href="{{ route('posts.index') }}"
        @class([
            'transition-colors hover:text-blue-600',
            'text-blue-600' => request()->routeIs('posts.index'),
        ])"
    >
        @if (request()->routeIs('posts.index'))
            <x-heroicon-s-fire class="mx-auto size-6 md:size-7" />
        @else
            <x-heroicon-o-fire class="mx-auto size-6 md:size-7" />
        @endif

        Bài viết
    </a>

    <a
        wire:navigate
        href="{{ route('links.index') }}"
        @class([
            'transition-colors hover:text-blue-600',
            'text-blue-600' => request()->routeIs('links.index'),
        ])"
    >
        @if (request()->routeIs('links.index'))
            <x-heroicon-s-link class="mx-auto size-6 md:size-7" />
        @else
            <x-heroicon-o-link class="mx-auto size-6 md:size-7" />
        @endif

        Dự án
    </a>

    <x-dropdown>
        <x-slot:btn>
            <x-heroicon-o-ellipsis-horizontal
                class="mx-auto transition-transform size-6 md:size-7"
                x-bind:class="{ 'rotate-90': open }"
            />
            More
        </x-slot>

        <x-slot:items>
            <x-dropdown.item href="{{ route('home') }}#about">
                <x-heroicon-o-question-mark-circle class="size-4" />
                About me
            </x-dropdown.item>

            <x-dropdown.divider>
                Follow me
            </x-dropdown.divider>

            <x-dropdown.item href="https://www.linkedin.com/in/benjamincrozat" target="_blank">
                <x-iconoir-facebook class="size-4" />
                Facebook
            </x-dropdown.item>

            <x-dropdown.item href="https://x.com/benjamincrozat" target="_blank">
                <x-iconoir-x class="size-4" />
                X (Twitter)
            </x-dropdown.item>
        </x-slot>
    </x-dropdown>
</nav>
