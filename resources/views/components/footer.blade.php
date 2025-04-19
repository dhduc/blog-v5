<style>
    #backToTopBtn {
        display: none; /* Hidden by default */
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 100;
        font-size: 15px;
        padding: 10px;
        border: none;
        background-color: #333;
        color: white;
        cursor: pointer;
        border-radius: 8px;
        opacity: 0.7;
        transition: opacity 0.3s;
    }

    #backToTopBtn:hover {
        opacity: 1;
    }

</style>
<div {{ $attributes->class('bg-gray-100') }}>
    <!-- Subscribe -->
    @livewire('subscribe')
    <!-- End Subscribe -->
    <footer class="mt-auto w-full max-w-[70rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto pt-0">


        <div class="">
            <div class="sm:flex sm:justify-between sm:items-center">
                <div class="flex flex-wrap items-center gap-3">
                    <div class="space-x-4 text-sm">
                        @foreach(setting('nav') as $nav)
                            <a wire:navigate href="{{ $nav['url'] }}" class="font-medium inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-hidden focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200">
                                {{ $nav['text'] }}
                            </a>
                        @endforeach

                        <a href="mailto:{{ setting('email') }}" target="_blank" class="font-medium inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-hidden focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200">
                            Liên hệ
                        </a>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between items-center gap-3">
                    <div class="mt-3 sm:hidden">
                        <a class="flex-none font-semibold text-xl text-black focus:outline-hidden focus:opacity-80 dark:text-white" href="#" aria-label="Brand">Brand</a>
                        <p class="mt-1 text-xs sm:text-sm text-gray-600 dark:text-neutral-400">
                            {{ setting('copyright') }}
                        </p>
                    </div>

                    <!-- Social Brands -->
                    <div class="space-x-4">
                        <a href="{{ setting('twitter') }}" target="_blank" class="inline-block text-gray-500 hover:text-gray-800 focus:outline-hidden focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                            </svg>
                        </a>
                        <a href="{{ setting('github') }}" target="_blank" class="inline-block text-gray-500 hover:text-gray-800 focus:outline-hidden focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                            </svg>
                        </a>
                    </div>
                    <!-- End Social Brands -->
                </div>
                <!-- End Col -->
            </div>
        </div>

        <p class="mt-6 text-center text-gray-400">{{ setting('footer') }}</p>
    </footer>
    <button id="backToTopBtn" title="Go to top">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06l-6.22-6.22V21a.75.75 0 0 1-1.5 0V4.81l-6.22 6.22a.75.75 0 1 1-1.06-1.06l7.5-7.5Z" clip-rule="evenodd" />
        </svg>

    </button>

</div>
<script>
    // Get the button
    if (! window.backToTopBtn) {
        let backToTopBtn = document.getElementById("backToTopBtn");
    }

    // Show/hide the button based on scroll position
    window.onscroll = function () {
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            backToTopBtn.style.display = "block";
        } else {
            backToTopBtn.style.display = "none";
        }
    };

    // Scroll smoothly to top when clicked
    backToTopBtn.onclick = function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    };


</script>
