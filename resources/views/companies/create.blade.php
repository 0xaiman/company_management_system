<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Create Company</h2>
    </x-slot>

    <div class="p-6 ">

        <div class="flex justify-start mb-4 gap-4 ">
            <a href="{{ route('companies.index') }}" class=" bg-gray-400 text-white p-2 rounded-md hover:bg-gray-600">&larr; Back</a>
        </div>

        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 ">
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('name') border-red-500 @enderror" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('email') border-red-500 @enderror" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="logo">Logo (min 100x100)</label>
                    <input type="file" name="logo" id="logo"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('logo') border-red-500 @enderror" accept="image/*">
                    @error('logo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="website_url">Website</label>
                    <input type="url" name="website_url" id="website_url" value="{{ old('website_url') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('website_url') border-red-500 @enderror">
                    @error('website_url')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Create Company
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
