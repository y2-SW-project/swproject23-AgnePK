@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jewellery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('jewellery.update', $jewellery) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <h2 class=" mb-10 text-4xl">Update your jewellery</h2>
                    <p>Name of jewellery:</p>
                    <x-input type="text" name="name" field="name" placeholder="name" class="w-full" autocomplete="off"
                        :value="@old('name', $jewellery->name)">
                    </x-input>

                    <p class="mt-6">Description:</p>
                    <x-textarea name="description" rows="10" field="description" placeholder="Start typing here..."
                        class="w-full mt-6" :value="@old('text', $jewellery->description)"></x-textarea>

                    <p class="mt-6">Price:</p>
                    <x-input type="decimal" name="price" field="price" placeholder="€00.00"
                        class="w-auto font-serif text-xl" autocomplete="off" :value="@old('price', $jewellery->price)">
                    </x-input>

                    <x-file-input type="file" name="img" placeholder="image" class="w-full mt-6" field="img">
                    </x-file-input>

                    <p class="mt-6">Select Category:</p>
                    <select class="form-select" name="category" aria-label="Default select example">
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                                {{ $category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <p class="mt-6">Select Material:</p>
                    {{-- <select class="form-select" name="material" aria-label="Default select example" >
                        @foreach ($materials as $material)
                            <option value="{{ $material }}" {{ old('material') == $material ? 'selected' : '' }}>
                                {{ $material }}</option>
                        @endforeach
                    </select> --}}
                    @foreach ($materials as $material)
                        <input type="radio", value="{{ $material }}" {{ old('material') == $material ? 'selected' : '' }} name="material">
                        {{ $material}} <br>
                    @endforeach
                    @error('material')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <x-primary-button class="mt-6">Save jewellery</x-primary-button>
                </form>
            </div>
        </div>
    </div>
@endsection
