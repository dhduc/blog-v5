<x-app
    :canonical="$post['canonical']"
    :description="$post['description']"
    :image="$post['image']"
    :title="$post['title']"
>
    <x-breadcrumbs class="container mt-6 md:mt-8 xl:max-w-screen-lg">
        <x-breadcrumbs.item href="{{ route('posts.index') }}">
            Bài viết
        </x-breadcrumbs.item>

        <x-breadcrumbs.item class="line-clamp-1">
            {{ $post['title'] }}
        </x-breadcrumbs.item>
    </x-breadcrumbs>

    <article class="mt-6 md:mt-8">
        <div class="container break-all lg:max-w-screen-md">
            @if ($post['image'])
                <img src="{{ $post['image'] }}" alt="{{ $post['title']  }}" class="object-cover w-full shadow-xl ring-1 ring-black/5 rounded-xl aspect-video" />
            @endif
        </div>

        @if (! empty($post['categories']))
            <div class="flex justify-center gap-2 mt-12 md:mt-16">
                @foreach ($post['categories'] as $category)
                    <div class="px-2 py-1 text-xs font-medium uppercase border rounded">
                        {{ $category->name }}
                    </div>
                @endforeach
            </div>
        @endif

        <h1 class="container mt-4 font-medium tracking-tight text-center text-black md:mt-8 text-balance text-3xl/none sm:text-4xl/none md:text-5xl/none lg:text-6xl/none">
            {{ $post['title'] }}
        </h1>

        <div class="container mt-6 md:mt-8 lg:max-w-screen-md">
            

            <x-table-of-contents
                :headings="extract_headings_from_markdown($post['content'])"
                class="mt-4 ml-0"
            />

            <x-prose class="mt-12 md:mt-16">
                {!! Str::markdown($post['content']) !!}
            </x-prose>
        </div>
    </article>

    <x-section
        id="comments"
        class="mt-12 md:mt-16 lg:max-w-screen-md"
    >
        <div class="grid grid-cols-2 gap-4 leading-tight md:grid-cols-3">
                <div class="flex-1 p-3 text-center rounded-lg bg-gray-50">
                    <x-heroicon-o-calendar class="mx-auto mb-1 opacity-75 size-6" />
                    {{ $post['modified_at'] ? 'Cập nhật' : 'Ngày đăng' }}<br />
                    {{ ($post['modified_at'] ?? $post['published_at'])->isoFormat('ll') }}
                </div>

                <div class="flex-1 p-3 text-center rounded-lg bg-gray-50">
                    <x-heroicon-o-user class="mx-auto mb-1 opacity-75 size-6" />
                    Viết bởi<br />
                    AirdropToday
                </div>

                <div class="flex-1 p-3 text-center rounded-lg bg-gray-50">
                    <x-heroicon-o-clock class="mx-auto mb-1 opacity-75 size-6" />
                    {{ $readTime ?? 0 }} phút<br />
                    đọc 
                </div>
            </div>
    </x-section>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Article",
            "author": {
                "@type": "Person",
                "name": "AirdropToday",
                "url": "{{ route('home') }}#about"
            },
            "headline": "{{ $post['title'] }}",
            "description": "{{ $post['description'] }}",
            "image": "{{ $post['image'] }}",
            "datePublished": "{{ $post['published_at']->toIso8601String() }}",
            "dateModified": "{{ $post['modified_at']?->toIso8601String() ?? $post['published_at']->toIso8601String() }}"
        }
    </script>
</x-app>
