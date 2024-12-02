
@extends('layouts.app')

@section('content')
<section>
    @if($newsletters->isEmpty())
        <div class="text-center">
            <h1 class="text-2xl font-bold">{{ __('No newsletters found') }}</h1>
        </div>
    @else
        <div class="grid grid-cols-5 gap-x-4 gap-y-2">
            @foreach($newsletters as $newsletter)
                @include('newsletters.components.card')
            @endforeach
        </div>
    @endif

    @if(count($newsletters) > 1)
        <div class="flex justify-center mt-8">
            <a href="{{ '/newsletters' }}">
                <button class="border-2 border-secondary hover:bg-secondary hover:text-white transition-all px-4 h-10">
                    <span>{{ __('More newsletters') }}</span>
                </button>
            </a>
        </div>
    @endif
</section>
@endsection
