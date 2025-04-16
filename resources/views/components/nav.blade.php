<nav {{ $attributes->class('flex items-center gap-6 md:gap-8 font-normal text-xs') }}>
    <x-logo />

    <div class="flex-grow"></div>

    <a
        wire:navigate
        href="{{ route('home') }}"
        @class([
            'transition-colors hover:text-primary-600',
            'text-primary-600' => request()->routeIs('home'),
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
            'transition-colors hover:text-primary-600',
            'text-primary-600' => request()->routeIs('posts.index'),
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
            'transition-colors hover:text-primary-600',
            'text-primary-600' => request()->routeIs('links.index'),
        ])"
    >
        @if (request()->routeIs('links.index'))
            <x-heroicon-s-link class="mx-auto size-6 md:size-7" />
        @else
            <x-heroicon-o-link class="mx-auto size-6 md:size-7" />
        @endif

        Dự án
    </a>

    <a
        href="{{ route('home') }}#about"
        @class([
            'transition-colors hover:text-primary-600',
        ])"
        >
        <x-heroicon-o-user-circle class="mx-auto size-6 md:size-7" />

        About me
    </a>

</nav>
