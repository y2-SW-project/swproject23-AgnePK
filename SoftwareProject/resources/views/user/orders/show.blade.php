@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="fs-1">
            {{ __('orders') }}
        </h2>
    </x-slot>
    <div  class="col-12 mt-5 ms-5">
        <div>
           <p class="fs-2">Your previous orders</p> 
        </div>
    </div>

    @forelse ($orders as $order)
        <div class="card" style="width: 20rem";>
            <div class="card-body">
                <p class="card-text"><strong> To: </strong>{{ $order->user->name }}</p>
                <p class="card-text"><strong> Address: </strong>{{ $order->user->address }}</p>
                <p class="card-text"><strong> When: </strong>{{ $order->date_ordered }}</p>
                <p class="card-text"><strong> Jewellery: </strong>{{ $order->jewellery_id }}</p>
                {{-- <p class="card-text">{{ $eachJewellery->id }}</p> --}}
            </div>
    </div> @empty
        <p>You have no orders yet.</p>
    @endforelse
    {{-- {{ $orders->links() }} --}}
@endsection
