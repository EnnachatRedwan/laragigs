@extends('layout')

@section('content')
    @include('partials._hero')
    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing" />
        @endforeach
    </div>
    @if (count($listings) == 0)
        <h2 class="text-center text-gray-500 font-bold">No listings found!</h2>
    @endif
    <div class="p-5">
        {{ $listings->links() }}
    </div>
@endsection
