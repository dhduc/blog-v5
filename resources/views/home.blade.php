<x-app>
    <div class="container mt-8 text-center">
        <div class="font-bold tracking-tight text-black text-4xl/none md:text-5xl lg:text-7xl text-balance">
            {{ setting('heading') }}
        </div>

        <div class="max-w-screen-xl mt-5 leading-tight text-black/75 text-lg/tight sm:text-xl/tight md:text-2xl/tight md:mt-8 lg:text-3xl text-balance">
            {{ setting('desc') }}
        </div>

    </div>

    <x-section title="Những dự án tiềm năng" class="mt-12 md:mt-16 lg:max-w-screen-md">
        <div class="flex flex-wrap justify-center mt-8 gap-y-4 gap-x-12">
            <a href="https://beyondco.de/?utm_source=benjamincrozat&utm_medium=logo&utm_campaign=benjamincrozat" target="_blank">
                <x-icon-beyond-code class="h-7 md:h-8" />
                <span class="sr-only">Beyond Code</span>
            </a>

            <a href="https://nobinge.ai" target="_blank">
                <x-icon-nobinge class="h-6 md:h-7" />
                <span class="sr-only">Nobinge</span>
            </a>

            <a href="https://redirect.pizza?utm_source=benjamincrozat.com&utm_medium=logo&utm_campaign=sponsorship" target="_blank">
                <img
                    loading="lazy"
                    src="{{ Vite::asset('resources/img/redirect-pizza.png') }}"
                    width="400"
                    height="124"
                    alt="redirect.pizza"
                    class="flex-shrink-0 w-auto h-9 snap-start scroll-ml-4"
                />
            </a>
        </div>
        <div class="text-center sm:text-xl mt-7">
            {{ setting('intro') }}
        </div>
    </x-section>

    <x-section title="Bài viết mới nhất" id="latest" class="mt-16 md:mt-20">
        <ul class="grid gap-10 mt-8 gap-y-16 xl:gap-x-16 md:grid-cols-3 xl:grid-cols-3">
            @foreach ($latest as $post)
                <li>
                    <x-post :$post />
                </li>
            @endforeach
        </ul>

        <div class="mt-16 text-center">
            <x-btn
                primary
                wire:navigate
                href="{{ route('posts.index') }}"
            >
                Xem tất cả bài viết
            </x-btn>
        </div>
    </x-section>

</x-app>
