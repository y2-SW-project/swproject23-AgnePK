@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="fs-1">
            {{ __('orders') }}
        </h2>
    </x-slot>
    @forelse ($orders as $order)
        <div class="card" style="width: 20rem";>
            <div class="card-body">
                {{-- <img src="{{ asset('storage/images/' . $order->img) }}" class="card-img-top" alt="..."> --}}
                <h2>
                    {{-- <a href="{{ route('orders.show', $order) }}">{{ $order->name }}</a> --}}
                </h2>
                {{-- <a href="{{ route('jewellery.show', $order) }}">{{ $order->jewellery->name }}</a> --}}
                <p class="card-text">{{ $order->user->address }}</p>
                <p class="card-text">{{ $order->id }}</p>
            </div>
    </div> @empty
        <p>You have no orders yet.</p>
    @endforelse
    {{-- {{ $orders->links() }} --}}
@endsection
