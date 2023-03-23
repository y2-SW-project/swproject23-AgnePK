<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jewellery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('jewellery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h2 class=" mb-10 text-4xl">Upload your jewellery</h2>
                    <p>Name of jewellery:</p>
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name')">
                    </x-text-input>
                    @error('name')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    <p class="mt-6">Description:</p>
                    <x-textarea
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="describe here"
                        class="w-full mt-6"
                        :value="@old('description')">
                    </x-textarea>

                    <p class="mt-6">Price:</p>
                    <x-text-input
                        type="decimal"
                        name="price"
                        field="price"
                        placeholder="€00.00"
                        class="w-auto font-serif text-xl"
                        autocomplete="off"
                        :value="@old('price')">
                    </x-text-input>
                    @error('price')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
     
                    <x-file-input
                        type="file"
                        name="img"
                        placeholder="image"
                        class="w-full mt-6"
                        field="img">
                    </x-file-input>

                    <p class="mt-6">Category:</p>
                    <x-text-input
                        type="text"
                        name="category"
                        field="category"
                        placeholder="category"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('category')">
                    </x-text-input>
                    @error('category')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    <p class="mt-6">Material:</p>
                    <x-text-input
                        type="text"
                        name="material"
                        field="material"
                        placeholder="material"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('material')">
                    </x-text-input>
                    @error('material')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    <x-primary-button class="mt-6">Save Jewellery</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>