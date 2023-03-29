@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="fs-1">
            {{ __('Jewellery') }}
        </h2>
    </x-slot>
    <a href="{{ route('jewellery.create') }}" class="btn btn-primary">+ upload your jewellery</a>
    @forelse ($jewellery as $piece)
        <div class="card" style="width: 20rem";>
            <img src="{{ asset('storage/images/' . $piece->img) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h2>
                    <a href="{{ route('jewellery.show', $piece) }}">{{ $piece->name }}</a>
                </h2>
                <p class="card-text">{{ Str::limit($piece->description, 200) }}</p>
            </div>
    </div> @empty
        <p>You have no jewellery yet.</p>
    @endforelse
    {{ $jewellery->links() }}
@endsection
