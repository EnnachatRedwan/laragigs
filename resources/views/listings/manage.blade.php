@extends('layout')

@section('content')
    <div class="mx-4">
        <x-card>
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    Manage Gigs
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                    @if ($listings->isEmpty())
                        <p class="text-gray-500 text-center">No listings found</p>
                    @else
                        @foreach ($listings as $listing)
                            <tr class="border-gray-300">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="show.html">
                                        {{$listing->title}}
                                    </a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/listings/{{$listing->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                            class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    {{-- <form action="">
                                        <button class="text-red-600">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Delete
                                        </button>
                                    </form> --}}
                                    <form method="POST" action="/listings/{{ $listing->id }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="text-red-600">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif


                </tbody>
            </table>
        </x-card>
    </div>
@endsection
