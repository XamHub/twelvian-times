<article @class([
    "col-span-3 row-span-4" => $loop->first,
    "col-span-2 row-span-1" => !$loop->first,
])>
    @if(isset($newsletter->thumbnail))
    <picture>
        <img src="{{ Storage::url($newsletter->thumbnail) }}" alt="{{ $newsletter->subject }}" class="w-full h-80 object-cover" />
    </picture>
    @endif

    <div class="px-4 py-3">
        <h2 class="font-bold text-lg leading-none">{{ $newsletter->subject }}</h2>
        <p class="text-sm leading-1 opacity-50 mt-1">{!! sprintf('Posted by %s', $newsletter->author) !!}</p>

        <p class="mt-4">{{ $newsletter->description }}</p>
    </div>
</article>