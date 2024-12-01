<div class="bg-secondary border-2 border-white w-full h-10"></div>

<header class="grid items-center gap-2 pt-6 pb-10">
    <a href="{{ url('/') }}" class="flex">
        <svg class="text-primary hover:text-black transition-all" xmlns="http://www.w3.org/2000/svg" width="100%" height="88" viewBox="0 0 100% 88">
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="Times New Roman, serif" font-size="80" fill="currentColor" font-weight="bold">
                {{ config('app.name') }}
            </text>
        </svg>
    </a>

    <div class="flex justify-center border-4 border-secondary p-2">{{ sprintf('Written by %s', "Whirly'sWorld") }}</div>
</header>
