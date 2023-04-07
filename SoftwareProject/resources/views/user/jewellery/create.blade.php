@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jewellery') }}
        </h2>
    </x-slot>

    <form action="{{ route('user.jewellery.store') }}" method="post" enctype="multipart/form-data"
        class="bg-transparent my-6 p-6">
        @csrf
        <div class="container fs-4">
            <div class="row">
                <div class="col-12">
                    <h2 class=" mt-3 mb-5 text-4xl">Upload your jewellery</h2>
                </div>

                <div class="col-3">
                    <p>Name of jewellery:</p>
                    <x-input type="text" name="name" field="name" placeholder="name"
                        class="w-full border-0 rounded-0 border-bottom" autocomplete="off" :value="@old('name')">
                    </x-input>

                    <p class="mt-6">Price:</p>
                    <x-input type="decimal" name="price" field="price" placeholder="€00.00"
                        class="w-auto  border-0 rounded-0 border-bottom" autocomplete="off" :value="@old('price')">
                    </x-input>
                </div>
                <div class="col-9">
                    <p class="mt-6">Description:</p>
                    <x-textarea name="description" rows="10" field="description" placeholder="describe here"
                        class="w-full mt-6" :value="@old('description')">
                    </x-textarea>
                </div>

                <div class="col-3">
                    <p class="mt-6">Upload your image:</p>
                    <x-file-input type="file" name="img" placeholder="image" class="w-full mt-6" field="img">
                    </x-file-input>
                </div>
                <div class="col">
                    <p class="mt-6">Select Category:</p>
                    <select class="form-select" name="category" aria-label="Default select example" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                                {{ $category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-danger text-xs">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <p class="mt-6">Select Material:</p>
                    <select class="form-select" name="material" aria-label="Default select example" multiple>
                        @foreach ($materials as $material)
                            <option value="{{ $material }}" {{ old('material') == $material ? 'selected' : '' }}>
                                {{ $material }}</option>
                        @endforeach
                    </select>
                    @error('material')
                        <div class="text-danger ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <x-primary-button>Save Jewellery</x-primary-button>
                </div>
            </div>
        </div>
    </form>
@endsection
