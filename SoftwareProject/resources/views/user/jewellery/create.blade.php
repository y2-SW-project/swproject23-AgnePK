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
                <form action="{{ route('user.jewellery.store') }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <h2 class=" mb-10 text-4xl">Upload your jewellery</h2>
                    <p>Name of jewellery:</p>
                    <x-input type="text" name="name" field="name" placeholder="name" class="w-full"
                        autocomplete="off" :value="@old('name')">
                    </x-input>


                    <p class="mt-6">Description:</p>
                    <x-textarea name="description" rows="10" field="description" placeholder="describe here"
                        class="w-full mt-6" :value="@old('description')">
                    </x-textarea>

                    <p class="mt-6">Price:</p>
                    <x-input type="decimal" name="price" field="price" placeholder="€00.00"
                        class="w-auto font-serif text-xl" autocomplete="off" :value="@old('price')">
                    </x-input>

                    <p class="mt-6">Upload your image:</p>
                    <x-file-input type="file" name="img" placeholder="image" class="w-full mt-6" field="img">
                    </x-file-input>

                    <p class="mt-6">Select Category:</p>
                    <select class="form-select" name="category" aria-label="Default select example" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}"  {{(old('category') == $category) ? "selected" : ""}}>{{ $category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <p class="mt-6">Select Material:</p>
                    <select class="form-select" name="material" aria-label="Default select example" multiple>
                        @foreach ($materials as $material)
                            <option value="{{ $material }}"  {{(old('material') == $material) ? "selected" : ""}}>{{ $material }}</option>
                        @endforeach
                    </select>
                    @error('material')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <x-primary-button class="mt-6">Save Jewellery</x-primary-button>
                </form>
            </div>
        </div>
    </div>
@endsection
