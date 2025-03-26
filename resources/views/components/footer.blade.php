<div {{ $attributes->class('bg-gray-100') }}>
    <footer class="container py-8">
        <nav class="flex flex-wrap items-center justify-center gap-x-8 gap-y-2">
            <a wire:navigate href="{{ route('home') }}" class="font-medium">Home</a>
            <a wire:navigate href="{{ route('posts.index') }}" class="font-medium">Bài viết</a>
            <a wire:navigate href="{{ route('links.index') }}" class="font-medium">Dự án</a>
            <a href="{{ route('home') }}#about" class="font-medium">Giới thiệu</a>
            <a href="mailto:hello@benjamincrozat.com" class="font-medium">Liên hệ</a>
        </nav>

        <p class="mt-6 text-center text-gray-400">Please don't steal my content. © {{ date('Y') }} blah blah blah.</p>
    </footer>
</div>
