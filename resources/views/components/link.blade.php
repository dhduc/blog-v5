@props(['link'])

<div {{ $attributes }}>
    <a href="{{ $link->url }}" target="_blank">
        @if ($link->image_url)
            <img src="{{ asset('storage/' . $link->image_url) }}" alt="{{ $link->title  }}" class="object-cover transition-opacity shadow-md shadow-black/5 rounded-xl aspect-video hover:opacity-50 ring-1 ring-black/5" />
        @else
            @php
            $bgColors = collect([
                'bg-amber-600', 'bg-blue-600', 'bg-cyan-600', 'bg-emerald-600', 'bg-gray-600', 'bg-green-600', 'bg-indigo-600', 'bg-lime-600', 'bg-pink-600', 'bg-purple-600', 'bg-red-600', 'bg-sky-600', 'bg-teal-600', 'bg-yellow-600',
            ])->random();
            @endphp

            <div class="transition-opacity {{ $bgColors }} shadow-md ring-1 ring-black/5 hover:opacity-50 aspect-video rounded-xl shadow-black/5"></div>
        @endif
    </a>

    <div class="mt-4">
        <time datetime="{{ $link->is_approved }}">
            {{ $link->is_approved }}
        </time>

        <span class="inline-block mx-2 text-xs -translate-y-px opacity-50">•</span>

        <a href="{{ $link->url }}" target="_blank" class="text-black underline underline-offset-4 decoration-black/30">
            {{ $link->user }}
        </a>
    </div>

    <div class="flex items-center justify-between gap-6 mt-2">
        <a href="{{ $link->url }}" target="_blank" class="font-bold transition-colors text-xl/tight hover:text-blue-600">
            {{ $link->title }}
        </a>
    </div>

    <div class="mt-2">
        {!! Str::markdown($link->description ?? '') !!}
    </div>
</div>
