<section @class([
    "mt-4 gap-12 space-y-4 content",
    "md:columns-1" => $block['data']['columns'] === 'columns-1',
    "md:columns-2" => $block['data']['columns'] === 'columns-2',
])>
    {!! $block['data']['content'] !!}
</section>
