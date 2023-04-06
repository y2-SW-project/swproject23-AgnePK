@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="fs-1">
            {{ __('Jewellery') }}
        </h2>
    </x-slot>
    <div class="contain d-flex">
        <div class="row me-2">
            <div class="dropdown mb-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Choose Category
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('admin.jewellery.index') }}">Rings</a></li>
                    <li><a class="dropdown-item" href="#">Necklaces</a></li>
                    <li><a class="dropdown-item" href="#">Bracelets</a></li>
                    <li><a class="dropdown-item" href="#">Earrings</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="dropdown mb-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Choose Material
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('admin.jewellery.index') }}">Sterling Silver</a></li>
                    <li><a class="dropdown-item" href="#">Gold</a></li>
                    <li><a class="dropdown-item" href="#">Rosegold</a></li>
                    <li><a class="dropdown-item" href="#">White gold</a></li>
                    <li><a class="dropdown-item" href="#">Bronze</a></li>
                </ul>
            </div>
        </div>
    </div>
    @forelse ($jewellery as $piece)
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
     @empty
        <p>You have no jewellery yet.</p>
    @endforelse
    {{ $jewellery->links() }}
@endsection
