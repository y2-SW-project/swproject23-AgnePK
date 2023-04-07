@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jewellery') }}
        </h2>
    </x-slot>

    <div class="col-5 ps-5">
        <img class="border border-grey shadow-lg" src="{{ asset('storage/images/' . $jewellery->img) }}" width="450">
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
            <p class="btn-holder py-4"><a
                    href="{{ route('admin.addjewellery.to.cart', $jewellery->id) }}"class="btn btn-dark rounded-0 px-5 fs-3">Add
                    to cart</a> </p>
            <p class="mt-3"><strong>Category:</strong> {{ $jewellery->category }}</p>
            <p class="mt-3"><strong>Material:</strong> {{ $jewellery->material }}</p>
            <p class="mt-4 fs-4">{{ $jewellery->description }}</p>
        </div>

    </div>

    <div class="col-12 d-flex mt-4">
        {{-- The button below takes you to the edit page.  --}}
        <p class="btn-holder ms-auto pe-3"><a href="{{ route('admin.jewellery.edit', $jewellery) }}"
                class="btn btn-secondary">Edit jewellery</a></p>
        {{-- It goes to the jewelleryController and calls all the functions. --}}
        <form action="{{ route('admin.jewellery.destroy', $jewellery) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you wish to delete this jewellery?')">Delete
                jewellery
            </button>
    </div>

    <div class="row pt-5 px-0">
        <div class="similarItems col-12 pt-3">
            <p class="lead ps-4 fs-3 fw-bold mb-0">Similar items you might like</p>
            <div class="col d-flex ">
                @foreach ($allJewellery as $piece)
                    <div class="card rounded-0 border-0 bg-transparent" style="width: 17rem";>
                        <a href="{{ route('user.jewellery.show', $piece) }}"><img
                                src="{{ asset('storage/images/' . $piece->img) }}"
                                class="card-img-top rounded-0 border border-dark" alt="..."></a>
                        <div class="card-body px-0 pt-1">
                            <h3 class="fs-4">
                                <a class="link-dark"
                                    href="{{ route('user.jewellery.show', $piece) }}">{{ $piece->name }}</a>
                            </h3>
                            <p class="card-text fs-5 mt-2">€{{ $piece->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-12 mt-5">
            <div class="d-flex justify-content-between mb-3">
                <div class="ms-3">
                    <h4 class="fs-2 ">Reviews for this seller</h4>
                    <p>3 reviews</p>
                </div>
                <div class="fs-2">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                </div>
            </div>
            <div class="d-flex justify-content-evenly">
                <div class="text-center px-4" style="width: 25rem;">
                    <img src="https://picsum.photos/70?random=1" class="rounded-circle" alt="Profile image"><br>
                    <span>Joseph O'Donelly</span>
                    <div class="my-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="fst-italic text-wrap">"Had an awesome experience! I can see why all the reviews are 5-star.
                        Great selection, wonderful service. Customer ervice was attentive and really helped with options
                        within my budget."</p>
                </div>
                <div class="text-center px-4 mb-2" style="width: 25rem;">
                    <img src="https://picsum.photos/70?random=3" class="rounded-circle" alt="Profile image"><br>
                    <span>Joseph O'Donelly</span>
                    <div class="my-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="fst-italic text-wrap">" I had the greatest experience with a custom ring design here! If you
                        need custom work done, this is your spot!!! 100% recommend!"</p>
                </div>
                <div class="text-center px-4" style="width: 25rem;">
                    <img src="https://picsum.photos/70?random=2" class="rounded-circle" alt="Profile image"><br>
                    <span>Joseph O'Donelly</span>
                    <div class="my-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </div>
                    <p class="fst-italic text-wrap">"I had a nice experience visiting! They have a great selection of
                        watches and it's a very appealing atmosphere! They helped me out and was friendly and helpful!"</p>
                </div>
            </div>
        </div>
    </div>
@endsection
