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

    <div class="flex justify-center mt-8">
        <a href="{{ '/newsletters' }}">
            <button class="border-2 border-secondary hover:bg-secondary hover:text-white transition-all px-4 h-10">
                <span>{{ __('More newsletters') }}</span>
            </button>
        </a>
    </div>
</section>

@endsection