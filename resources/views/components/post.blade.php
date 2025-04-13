@props(['post'])

<?php

?>
<div {{ $attributes->class('flex flex-col h-full') }}>
    @if ($post['image'])
        <a wire:navigate href="{{ route('posts.show', $post['slug']) }}">
            <img src="{{ asset('storage/'.$post['image']) }}" alt="{{ $post['title']  }}" class="object-cover transition-opacity shadow-md shadow-black/5 rounded-xl aspect-video hover:opacity-50 ring-1 ring-black/5" />
        </a>
    @endif

    @if (! empty($post['categories']))
        <div class="flex gap-2 mt-6">
            @foreach ($post['categories'] as $category)
                <div class="px-2 py-1 text-xs font-medium uppercase border rounded">
                    {{ $category->name }}
                </div>
            @endforeach
        </div>
    @endif

    <div class="flex items-center justify-between gap-6 mt-5">
        <a wire:navigate href="{{ route('posts.show', $post['slug']) }}" class="font-bold transition-colors text-xl/tight hover:text-blue-600">
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
