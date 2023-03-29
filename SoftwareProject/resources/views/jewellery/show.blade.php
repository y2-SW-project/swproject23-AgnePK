@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jewellery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <p class="opacity-70">
                    <strong>Created: </strong> {{ $jewellery->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml-8">
                    <strong>Updated at: </strong> {{ $jewellery->updated_at->diffForHumans() }}
                </p>
                {{-- The button below takes you to the edit page.  --}}
                <a href="{{ route('jewellery.edit', $jewellery) }}" class="btn-link ml-auto">Edit jewellery</a>
                {{-- It goes to the jewelleryController and calls all the functions. --}}
                <form action="{{ route('jewellery.destroy', $jewellery) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4"
                        onclick="return confirm('Are you sure you wish to delete this jewellery?')">Delete
                        jewellery</button>
            </div>

            {{-- In this div i just show all the info from my DB. --}}
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex">
                <div class="">
                    <h2 class="font-bold text-4xl">
                        {{ $jewellery->name }}
                    </h2>
                    <img class="border-b border-gray-400 shadow-lg sm:rounded-lg mt-5"
                        src="{{ asset('storage/images/' . $jewellery->img) }}" width="350">
                </div>

                <div class="ml-6">
                    <p class="mt-3 whitespace-">{{ $jewellery->name }}</p>
                    <p class="mt-3">Find us at: {{ $jewellery->category }}</p>
                    <p class="mt-3">Find us at: {{ $jewellery->material }}</p>
                    <p class="mt-3 font-serif text-2xl">€{{ $jewellery->price }}</p>
                </div>

            </div>


        </div>
    </div>
@endsection
