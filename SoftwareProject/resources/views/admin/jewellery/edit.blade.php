@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.jewellery.update', $jewellery) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="col-10 mx-auto">
            <div class="container fs-4">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mt-3 mb-5 text-4xl">Update your jewellery</h2>
                    </div>

                    <div class="col-3">
                        <p>Name of jewellery:</p>
                        <x-input type="text" name="name" field="name" placeholder="name" class="w-full"
                            autocomplete="off" :value="@old('name', $jewellery->name)">
                        </x-input>

                        <p class="mt-6">Price:</p>
                        <x-input type="decimal" name="price" field="price" placeholder="€00.00"
                            class="w-auto font-serif text-xl" autocomplete="off" :value="@old('price', $jewellery->price)">
                        </x-input>
                    </div>
                    <div class="col-9">
                        <p class="mt-6">Description:</p>
                        <x-textarea name="description" rows="10" field="description" placeholder="Start typing here..."
                            class="w-full mt-6" :value="@old('text', $jewellery->description)"></x-textarea>

                    </div>

                    <div class="col-3">
                        <p class="mt-6">Upload your image:</p>
                        <x-file-input type="file" name="img" placeholder="image" class="w-full mt-6" field="img">
                        </x-file-input>
                    </div>

                    <div class="col fs-5">
                        <p class="mt-6 fs-4">Select Category:</p>
                        <select class="form-select" field="category" name="category" label="Choose category">
                            @foreach ($categories as $category)
                                <option value="{{ $category }}" @selected(old('category', $jewellery->category) == $category)>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="col fs-5">
                        <p class="mt-6 fs-4">Select Material:</p>
                        <select class="form-select" field="material" name="material" label="Choose material">
                            @foreach ($materials as $material)
                                <option value="{{ $material }}" @selected(old('material', $jewellery->material) == $material)>
                                    {{ $material }}
                                </option>
                            @endforeach
                        </select>
                        @error('material')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <x-primary-button>Save and Upload</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
