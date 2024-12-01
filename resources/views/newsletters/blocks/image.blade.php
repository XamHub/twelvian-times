<section class="my-8">
    <picture>
        <source srcset="{{ Storage::url($block['data']['url']) }}" type="image/webp">
        <img src="{{ Storage::url($block['data']['url']) }}" alt="{{ $block['data']['alt'] }}">
    </picture>

    @if($block['data']['alt'])
        <figcaption>{{ $block['data']['alt'] }}</figcaption>
    @endif
</section>
