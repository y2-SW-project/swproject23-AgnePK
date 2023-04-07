@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="fs-1">
            {{ __('Jewellery') }}
        </h2>
    </x-slot>
    <div class="px-0">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/images/hero7.png') }}" class="d-block img-fluid h-50" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Find anything you need</h5>
                        <p>For a special someone, for youself, for whichever occasion it may be</p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('storage/images/hero3.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block text-dark">
                        <h5>Upload and Sell</h5>
                        <p>If you dont want it anymore, someone else will be happy to have it</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-8 border-top border-bottom d-flex justify-content-evenly">
                <div class="dropdown form-check">
                    <button class="btn border-0 text-uppercase fs-5" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <p class="mb-0">Material</p>
                    </button>
                    <ul class="dropdown-menu bg-light border-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Gold
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Sterling Silver
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Rose Gold
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Bronze
                            </label>
                        </div>
                    </ul>
                </div>
                <div class="dropdown">
                    <button for="customRange1"class="btn border-0 text-uppercase fs-5" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <p class="mb-0">price</p>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <input type="range" class="dropdown-item form-range" id="customRange1">
                        </li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn border-0 text-uppercase fs-5" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <p class="mb-0">type</p>
                    </button>
                    <ul class="dropdown-menu bg-light border-0">
                        <li><a class="dropdown-item" href="#">Ring</a></li>
                        <li><a class="dropdown-item" href="#">Bracelet</a></li>
                        <li><a class="dropdown-item" href="#">Necklace</a></li>
                        <li><a class="dropdown-item" href="#">Earrings</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn border-0 text-uppercase fs-5" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <p class="mb-0">category</p>
                    </button>
                    <ul class="dropdown-menu bg-light border-0">
                        <li><a class="dropdown-item" href="#">Sets</a></li>
                        <li><a class="dropdown-item" href="#">Present</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col ms-5">
                <p class="fs-3 mb-0">All Jewellery</p>
            </div>
            <div class="col-3 d-flex"> 
                {{-- <label class="input-group-text" for="inputGroupSelect01">Sort By</label> --}}
                <select class="form-select" id="inputGroupSelect01">
                    <option selected>Sort By</option>
                    <option value="1">Price: High to Low</option>
                    <option value="2">Price: Low to High</option>
                    <option value="3">Popular</option>
                    <option value="3">Newest</option>
                </select>
            </div>
        </div>
    </div>
    @forelse ($jewellery as $piece)
        <div class="card rounded-0 border-0 bg-transparent" style="width: 17rem";>
            <img src="{{ asset('storage/images/' . $piece->img) }}" class="card-img-top rounded-0 border border-dark"
                alt="...">
            <div class="card-body px-0 pt-1">
                <h2 class="fs-4">
                    <a class="link-dark" href="{{ route('user.jewellery.show', $piece) }}">{{ $piece->name }}</a>
                </h2>
                <p class="card-text fs-5 mt-2">€{{ $piece->price }}</p>
                <a href="{{ route('user.addjewellery.to.cart', $piece->id) }}" class="text-dark btn btn-light">Add to
                    cart</a>
            </div>
        </div>
    @empty
        <p>You have no jewellery yet.</p>
    @endforelse
    {{ $jewellery->links() }}
@endsection
