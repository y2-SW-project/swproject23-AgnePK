@extends('layouts.app')

@section('content')
    <div class="col-5 ps-5 my-5">
        <img class="border border-grey shadow-lg" src="{{ asset('storage/images/' . $jewellery->img) }}" width="450">
    </div>

    <div class="col-7 bg-transparent">
        <div class="mt-5 pt-2">
            <h2 class="fs-1">
                {{ $jewellery->name }}
            </h2>
            <hr>

        </div>

        <div class="fs-5">
            <p class="mt-3 fs-3 text-dark">€{{ $jewellery->price }}</p>
            <p class="btn-holder py-4"><a
                    href="{{ route('user.addjewellery.to.cart', $jewellery->id) }}"class="btn btn-dark rounded-0 px-5 fs-3">Add
                    to cart</a> </p>
            <p class="mt-3"><strong>Category:</strong> {{ $jewellery->category }}</p>
            <p class="mt-3"><strong>Material:</strong> {{ $jewellery->material }}</p>
            <p class="mt-4 fs-4">{{ $jewellery->description }}</p>
        </div>

    </div>

    <div class="row pt-3 px-0">
        <div class="similarItems col-12 pt-3 mt-5">
            <p class="lead ps-4 fs-3 fw-bold mb-0">Similar items you might like</p>
            <div class="col d-flex ">
                @foreach ($allJewellery as $piece)
                    <div class="card rounded-0 border-0 bg-transparent" style="width: 17rem";>
                        <a href="{{ route('user.jewellery.show', $piece) }}"><img
                                src="{{ asset('storage/images/' . $piece->img) }}"
                                class="card-img-top rounded-0 border border-dark" alt="..."></a>
                        <div class="card-body px-0 pt-1">
                            <h3 class="fs-4 text-black">
                                <a class="link-dark"
                                    href="{{ route('user.jewellery.show', $piece) }}">{{ $piece->name }}</a>
                            </h3>
                            <p class="card-text text-black fs-5 mt-2">€{{ $piece->price }}</p>
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
