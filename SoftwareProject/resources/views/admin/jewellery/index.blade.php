@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="fs-1">
            {{ __('Jewellery') }}
        </h2>
    </x-slot>
    <div class="width-100 bg-black d-flex justify-content-center">
        <p class="text-white pt-3">Become a member to sell YOUR own jewellery!</p>
    </div>
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
                    <div class="carousel-caption d-none d-md-block text-black">
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
                <div class="dropdown">
                    <button class="btn border-0 text-uppercase fs-5" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <p class="mb-0">material</p>
                    </button>
                    <ul class="dropdown-menu bg-light border-0">
                        <li><a class="dropdown-item" href="#">Gold</a></li>
                        <li><a class="dropdown-item" href="#">White Gold</a></li>
                        <li><a class="dropdown-item" href="#">Sterling Silver</a></li>
                        <li><a class="dropdown-item" href="#">Rose Gold</a></li>
                        <li><a class="dropdown-item" href="#">Bronze</a></li>
                    </ul>
                </div>
                <div class="dropdown ">
                    <button for="customRange1"class="btn border-0 text-uppercase fs-5" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <p class="mb-0">price</p>
                    </button>
                    <ul class="dropdown-menu bg-light">
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
                <select class="form-select bg-light" id="inputGroupSelect01">
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
            <a href="{{ route('admin.jewellery.show', $piece) }}"><img src="{{ asset('storage/images/' . $piece->img) }}"
                    class="card-img-top rounded-0 border border-dark" alt="..."></a>
            <div class="card-body px-0 pt-1">
                <h2 class="fs-4">
                    <a class=" text-dark" href="{{ route('admin.jewellery.show', $piece) }}">{{ $piece->name }}</a>
                </h2>
                <p class="card-text fs-5 mt-2 ">€{{ $piece->price }}</p>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.addjewellery.to.cart', $piece->id) }}"
                        class="text-black btn btn-primary rounded-0">Add to
                        cart</a>
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#QuickView">
                        <i class="bi bi-zoom-in"></i></button>
                    <div class="modal fade" id="QuickView" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content p-3">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Quick View: {{ $piece->name }}
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div
                                    class="modal-bodycard rounded-0 border-0 bg-transparent d-flex justify-content-evenly">
                                    <a href="{{ route('admin.jewellery.show', $piece) }}" class="pt-3"><img
                                            src="{{ asset('storage/images/' . $piece->img) }}"
                                            class="rounded-0 border border-dark" alt="...">
                                    </a>
                                    <div class="bg-transparent ps-3">
                                        <div class="pt-3">
                                            <h2 class="fs-3">
                                                {{ $piece->name }}
                                            </h2>
                                            <hr>
                                        </div>

                                        <div class="fs-5 ml-6">
                                            <p class="mt-3 fs-3 text-dark">€{{ $piece->price }}</p>
                                            <p class="btn-holder py-4"><a
                                                    href="{{ route('admin.addjewellery.to.cart', $piece->id) }}"class="btn btn-dark rounded-0 px-5 fs-3">Add
                                                    to cart</a> </p>
                                            <p class="mt-3"><strong>Category:</strong> {{ $piece->category }}</p>
                                            <p class="mt-3"><strong>Material:</strong> {{ $piece->material }}</p>
                                            <p class="mt-4 fs-5">{{ $piece->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>You have no jewellery yet.</p>
    @endforelse
    {{-- {{ $jewellery->links() }} --}}
@endsection
