@extends('user.jewellery.shop')

@section('content')
    <div class="row">
        @foreach ($jewellerys as $jewellery)
            <div class="col-md-3 col-6 mb-4">
                <div class="card">
                    <img src="{{ $jewellery->image }}" alt="{{ $jewellery->name }}" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">{{ $jewellery->name }}</h4>
                        <p>{{ $jewellery->author }}</p>
                        <p class="card-text"><strong>Price: </strong> ${{ $jewellery->price }}</p>
                        <p class="btn-holder"><a href="{{ route('addjewellery.to.cart', $jewellery->id) }}"
                                class="btn btn-outline-danger">Add to cart</a> </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
