@extends('layout')

@section('content')
    @include('partials._search')
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card>
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                    alt="" />

                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                <x-listing-tags-list :tagsCsv="$listing->tags" />
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $listing->description }}

                        <a href="mailto:{{ $listing->email }}"
                            class="block text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            style="background: rgb(0, 183, 255)"
                            ><i
                                class="fa-solid fa-envelope"
                                ></i>
                            Contact Employer</a>

                        <a href="{{ $listing->website }}" target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-globe"></i> Website</a>

                        @auth()
                            @if (auth()->user()->id == $listing->user_id)
                                <a href="/listings/{{ $listing->id }}/edit"
                                    class="block bg-green-600 text-white py-2 rounded-xl hover:opacity-80">
                                    <i class="fa-regular fa-pen-to-square"></i> edit
                                </a>
                                <form method="POST" action="/listings/{{ $listing->id }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="block bg-red-500 text-white py-2 rounded-xl hover:opacity-80 w-full">
                                        <i class="fa-regular fa-pen-to-square"></i> delete
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </x-card>
    </div>
@endsection
