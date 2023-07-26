@extends('layout')

@section('content')
    @if (count($listings) == 0)
        <h2>No listings found!</h2>
    @endif
@include('partials._hero')
@include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing" />
        @endforeach
    </div>
@endsection