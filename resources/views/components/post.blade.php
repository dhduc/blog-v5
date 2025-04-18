@props(['post'])

<?php

?>
<div {{ $attributes->class('flex flex-col h-full') }}>
    @if ($post['image'])
        <a wire:navigate href="{{ route('posts.show', $post['slug']) }}" class="relative">
            <img src="{{ asset('storage/'.$post['image']) }}" alt="{{ $post['title']  }}" class="object-cover transition-opacity shadow-md shadow-black/5 rounded-xl aspect-video hover:opacity-50 ring-1 ring-black/5" />
            <span class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-neutral-900">
                Sponsored
            </span>
        </a>
    @endif

    @if (! empty($post['is_show_category']))
        <div class="flex gap-2 mt-6">
            <div class="px-2 py-1 text-xs font-medium uppercase border rounded">
                {{ $post['category']['name'] }}
            </div>
        </div>
    @endif

    <div class="flex items-center justify-between gap-6 mt-5">
        <a wire:navigate href="{{ route('posts.show', $post['slug']) }}" class="font-bold transition-colors text-xl/tight hover:text-primary-600">
            {{ $post['title'] }}
        </a>
    </div>

    <div class="flex-grow mt-4">
        {{ Str::limit($post['desc'], 200) }}
    </div>

    <div class="flex-grow mt-4 font-bold">
        Ngày đăng: {{ ($post['modified_at'] ?? $post['published_at'])->isoFormat('ll') }}
    </div>
</div>
