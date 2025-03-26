<x-app
    title="Community links"
    description="A collection of content created and shared by other web developers."
>
    <x-breadcrumbs class="container xl:max-w-screen-lg">
        <x-breadcrumbs.item>
            Dự án
        </x-breadcrumbs.item>
    </x-breadcrumbs>

    @if ($links->currentPage() === 1)
        <div class="container mt-16 mb-16 text-center text-black md:mb-32">
            <h1 class="font-bold tracking-tight text-black text-4xl/none md:text-5xl lg:text-7xl text-balance">
                <span class="text-blue-600">Cập nhật</span> từ cộng đồng
            </h1>
        </div>
    @endif

    <x-section :title="$links->currentPage() > 1 ? 'Page ' . $links->currentPage() : 'Dự án mới nhất'">
        @if ($links->isNotEmpty())
            <ul class="grid gap-10 mt-8 gap-y-16 xl:gap-x-16 md:grid-cols-2 xl:grid-cols-2">
                @foreach ($links as $link)
                    <li>
                        <x-link :$link />
                    </li>
                @endforeach
            </ul>
        @endif

        @if ($links->hasPages())
            <div class="mt-16">
                {{ $links->links() }}
            </div>
        @endif
    </x-section>
</x-app>
