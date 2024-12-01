<article @class([
    "col-span-3 row-span-4" => $loop->first,
    "col-span-2 row-span-1 border border-primary/50" => !$loop->first,
])>
    @if($loop->first && isset($newsletter->thumbnail))
    <a href="{{ route('newsletters.show', $newsletter) }}" class="block">
        <picture>
            <img src="{{ Storage::url($newsletter->thumbnail) }}" alt="{{ $newsletter->subject }}" class="w-full h-80 object-cover" />
        </picture>
    </a>
    @endif
    
    <div class="px-4 py-3">
        <a href="{{ route('newsletters.show', $newsletter) }}" class="max-w-max">
            <h2 class="font-bold text-lg leading-none hover:text-primary/50 transition-all max-w-max">{{ $newsletter->subject }}</h2>
        </a>
        <p class="text-sm leading-1 opacity-50 mt-1">{!! sprintf('Written by %s', $newsletter->author) !!}</p>

        @if($newsletter->description)
        <p class="mt-4">{{ $newsletter->description }}</p>
        @endif
    </div>
</article>