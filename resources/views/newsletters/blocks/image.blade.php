<section class="my-8">
    <picture @class([
        "block",
        "w-full" => $block['data']['size'] === 'w-full',
        "w-1/2" => $block['data']['size'] === 'w-1/2',
        "w-1/3" => $block['data']['size'] === 'w-1/3',
        "w-1/4" => $block['data']['size'] === 'w-1/4',
    ])>
        <source srcset="{{ Storage::url($block['data']['url']) }}" type="image/webp">
        <img 
            src="{{ Storage::url($block['data']['url']) }}" alt="{{ $block['data']['alt'] }}" 
        />
    </picture>

    @if($block['data']['alt'])
        <figcaption>{{ $block['data']['alt'] }}</figcaption>
    @endif
</section>
