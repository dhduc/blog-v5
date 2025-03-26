<x-app>
    <div class="container mt-8 text-center">
        <div class="font-bold tracking-tight text-black text-4xl/none md:text-5xl lg:text-7xl text-balance">
            Mang đến cho bạn những airdrops mới mẻ
        </div>

        <div class="mt-5 leading-tight text-black/75 text-lg/tight sm:text-xl/tight md:text-2xl/tight md:mt-8 lg:text-3xl text-balance">
            Khám phá tiền điện tử mới airdrops và tìm hiểu cách tham gia bằng hướng dẫn dễ làm theo.
        </div>

        <div class="flex items-center justify-center gap-2 text-center mt-7 md:mt-11">
           <!--  <x-btn href="#about">
                Who the F are you?
            </x-btn>
 -->
            <x-btn
                primary
                href="#latest"
            >
                View all airdrops
            </x-btn>
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
    </x-section>

    <x-section title="Bài viết mới nhất" id="latest" class="mt-16 md:mt-20">
        @if ($latest->isNotEmpty())
            <ul class="grid gap-10 mt-8 gap-y-16 xl:gap-x-16 md:grid-cols-2 xl:grid-cols-2">
                @foreach ($latest as $post)
                    <li>
                        <x-post :$post />
                    </li>
                @endforeach
            </ul>
        @endif

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

    <x-section title="Giới thiệu Airdrop Today" id="about" class="mt-16 lg:max-w-screen-md md:mt-20">
        <x-prose class="mt-8">
            <img
                src="https://www.gravatar.com/avatar/d58b99650fe5d74abeb9d9dad5da55ad?s=256"
                alt="Benjamin Crozat"
                class="float-right mt-4 ml-4 !rounded-full size-28 md:size-32"
            />

            {!! Str::markdown(<<<MARKDOWN
Hi! I'm from the South of France and I've been a self-taught web developer since 2006. When I started learning PHP and JavaScript, PHP 4 was still widely used, Internet Explorer 6 ruled the world, and we used DHTML to add falling snow on websites.

Để ủng hộ blog ra các bài viết tốt nhất, hãy sử dụng link giới thiệu của tác giả trong các bài viết, đây là cách giúp tác giả có thêm động lực viết bài.

Vui lòng không copy, sao chép nội dung của các bài viết dưới mọi hình thức.
MARKDOWN) !!}
        </x-prose>
    </x-section>
</x-app>
