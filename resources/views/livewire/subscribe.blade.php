<?php

use function Livewire\Volt\{state};

state(['email', 'success', 'error']);

$submit = function () {
    try {
        \App\Models\Newsletter::updateOrCreate([
            'email' => $this->email,
        ], ['is_subscribed' => true]);
        $this->email = '';
        $this->success = true;
    } catch (Exception $exception) {
        $this->error = true;
    }
}; ?>
<div class="max-w-[70rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-16 mx-auto">
    <div class="grid md:grid-cols-2 gap-8">
        <div class="max-w-md">
            <h2 class="text-2xl font-bold md:text-3xl md:leading-tight dark:text-white">Subscribe</h2>
            <p class="mt-3 text-gray-600 dark:text-neutral-400">
                {{ setting('subscribe') }}
            </p>
        </div>

        <form wire:submit="submit">
            <div class="w-full sm:max-w-lg md:ms-auto">
                <div class="flex flex-col items-center gap-2 sm:flex-row sm:gap-3">
                    <div class="w-full">
                        <label for="hero-input" class="sr-only">Search</label>
                        <input type="email" id="hero-input" name="email"
                               wire:model="email" required
                               class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm
                               focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none
                               dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500
                               dark:focus:ring-neutral-600" placeholder="Enter your email">
                    </div>
                    <button class="w-full sm:w-auto whitespace-nowrap py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 focus:outline-none focus:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                        Subscribe
                    </button>
                </div>
                <p class="mt-3 text-sm text-gray-500 dark:text-neutral-500">
                    No spam, unsubscribe at any time
                </p>
                @if($success)
                    <p class="mt-3 text-sm text-primary-600">Thanks for subscribing!</p>
                @endif
                @if($error)
                    <p class="mt-3 text-sm text-warning-500">Whoops, something went wrong. Please try again later!</p>
                @endif
            </div>
            <!-- Honeypot field (hidden from users) -->
            <div style="display: none;">
                <label for="honeypot">You cannot see this!</label>
                <input type="text" id="honeypot" name="honeypot" />
                <!-- The CSS "display: none;" style hides the field from regular users -->
            </div>
        </form>
    </div>
</div>
