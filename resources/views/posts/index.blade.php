<x-app>
    <div class="container mt-16 mb-10 text-center text-black">
        <h1 class="font-bold tracking-tight text-black md:text-3xl lg:text-5xl text-balance">
            <span class="text-primary-600">Cập nhật</span> từ cộng đồng
        </h1>
    </div>

    <x-section :title="$posts->currentPage() > 1 ? 'Page ' . $posts->currentPage() : 'Latest posts'" class="mt-8">
        @if ($posts->isNotEmpty())
            <ul class="grid gap-10 mt-8 gap-y-16 xl:gap-x-16 md:grid-cols-3 xl:grid-cols-3">
                @foreach ($posts as $post)
                    <li>
                        <x-post :$post />
                    </li>
                @endforeach
            </ul>
        @endif

        @if ($posts->hasPages())
            <div class="mt-16">
                {{ $posts->links() }}
            </div>
        @endif
    </x-section>
</x-app>
