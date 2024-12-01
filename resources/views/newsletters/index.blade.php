@extends('layouts.app')

@section('content')

<section class="grid lg:grid-cols-3 gap-8">
    @foreach($newsletters as $newsletter)
        @include('newsletters.components.card')
    @endforeach
</section>

@endsection