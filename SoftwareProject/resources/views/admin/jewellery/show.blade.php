@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jewellery') }}
        </h2>
    </x-slot>

    <div class="col-5">
        <img class="border border-grey shadow-lg" src="{{ asset('storage/images/' . $jewellery->img) }}"
            width="450">
    </div>

    {{-- In this div i just show all the info from my DB. --}}
    <div class="col-7 bg-transparent">
        <div class="pt-3">
            <h2 class="fs-1">
                {{ $jewellery->name }}
            </h2>
            <hr>

        </div>

        <div class="fs-5 ml-6">
            <p class="mt-3 fs-3 text-secondary">€{{ $jewellery->price }}</p>
            <p class="btn-holder py-4"><a href="{{ route('admin.addjewellery.to.cart', $jewellery->id) }}"class="btn btn-dark rounded-0 px-5 fs-3">Add to cart</a> </p>
            <p class="mt-3"><strong>Category:</strong>  {{ $jewellery->category }}</p>
            <p class="mt-3"><strong>Material:</strong>  {{ $jewellery->material }}</p>
            <p class="mt-4 fs-4">{{ $jewellery->description }}</p>
        </div>

    </div>

    <div class="col-12 d-flex mt-4">
        {{-- The button below takes you to the edit page.  --}}
        <p class="btn-holder ms-auto pe-3"><a href="{{ route('admin.jewellery.edit', $jewellery) }}" class="btn btn-secondary">Edit jewellery</a></p>
        {{-- It goes to the jewelleryController and calls all the functions. --}}
        <form action="{{ route('admin.jewellery.destroy', $jewellery) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you wish to delete this jewellery?')">Delete
                jewellery
            </button>
    </div>

    <div class="row">
        <div class="col">
            @foreach ($allJewellery as $piece)
            <div class="card rounded-0 border-0 bg-transparent" style="width: 17rem";>
                <a href="{{ route('admin.jewellery.show', $piece) }}"><img src="{{ asset('storage/images/' . $piece->img) }}" class="card-img-top rounded-0 border border-dark" alt="..."></a>
                <div class="card-body px-0 pt-1">
                    <h2 class="fs-4">
                        <a class="link-dark" href="{{ route('admin.jewellery.show', $piece) }}">{{ $piece->name }}</a>
                    </h2>
                    <p class="card-text fs-5 mt-2">€{{ $piece->price }}</p>
                    <a href="{{ route('admin.addjewellery.to.cart', $piece->id) }}" class="text-dark btn btn-light">Add to cart</a>
                </div>
        </div>
        @endforeach
    
        </div>
    </div>
@endsection
