<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-1">
            {{ __('Jewellery') }}
        </h2>
    </x-slot>
    <a href="{{ route('jewellery.create') }}" class="btn btn-primary">+ upload your jewellery</a>
    @forelse ($jewellery as $piece)
        <div class="card">
            <img src="{{asset('storage/images/' . $jewellery->img) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $piece->name }}</h5>
                <p class="card-text">{{ Str::limit($piece->description, 200) }}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
    </div> @empty
        <p>You have no jewellery yet.</p>
    @endforelse
    {{-- {{ $jewellery->links() }} --}}
</x-app-layout>
