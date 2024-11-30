
@extends('layouts.app')

@section('content')
<section>
    <div class="grid grid grid-cols-5 grid-rows-3">
        @foreach($newsletters as $newsletter)
            @include('newsletters.card')
        @endforeach
    </div>

    <div class="flex justify-center mt-8">
        <a href="{{ '/newsletters' }}">
            <button class="border-2 border-secondary hover:bg-secondary hover:text-white transition-all px-4 h-10">
                <span>{{ __('More newsletters') }}</span>
            </button>
        </a>
    </div>
</section>
@endsection
