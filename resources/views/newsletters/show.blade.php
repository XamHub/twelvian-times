@extends('layouts.app')

@section('content')

<section>
    @foreach($newsletter->blocks as $block)
        @if($block['type'] === 'heading')
            @include('newsletters.blocks.heading', ['block' => $block])
        @endif

        @if($block['type'] === 'text')
            @include('newsletters.blocks.text', ['block' => $block])
        @endif

        @if($block['type'] === 'image')
            @include('newsletters.blocks.image', ['block' => $block])
        @endif
    @endforeach
</section>

@endsection