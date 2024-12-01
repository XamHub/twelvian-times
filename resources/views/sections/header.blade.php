<div class="bg-secondary border-2 border-white w-full h-10"></div>

<header class="grid items-center gap-2 pt-6 pb-10">
    <a href="{{ url('/') }}" class="flex">
        <svg class="text-primary hover:text-black transition-all" xmlns="http://www.w3.org/2000/svg" width="100%" height="88" viewBox="0 0 100% 88">
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="Times New Roman, serif" font-size="80" fill="currentColor" font-weight="bold">
                {{ config('app.name') }}
            </text>
        </svg>
    </a>

    <div class="flex justify-between gap-3 border-4 border-secondary py-2 px-4">
        <span>{{ __('The World of Twelve') }}</span>

        @if(!request()->is('/') && $newsletter->subject)
            <span>{{ $newsletter->subject }}</span>
        @endif

        @if(!request()->is('/'))
            <span>{{ sprintf('Written by %s', $newsletter->author) }}</span>
        @else
            <span>{{ sprintf('Created by %s', "Whirly'sWorld") }}</span>
        @endif
    </div>
</header>
