<x-app title="About me - introduction">
    <div class="container mt-16 mb-10 text-center text-black">
        <h1 class="font-bold tracking-tight text-black md:text-3xl lg:text-5xl text-balance">
            About me
        </h1>
    </div>
    <x-section title="Giới thiệu Airdrop Today" id="about" class="mt-16 lg:max-w-screen-lg md:mt-20">
        <x-prose class="mt-8">
            <img
                src="https://www.gravatar.com/avatar/d58b99650fe5d74abeb9d9dad5da55ad?s=256"
                alt="Benjamin Crozat"
                class="float-right mt-4 ml-4 !rounded-full size-28 md:size-32"
            />

            {!! Str::markdown(auth()->user()->about ?? '') !!}
        </x-prose>
    </x-section>
</x-app>
