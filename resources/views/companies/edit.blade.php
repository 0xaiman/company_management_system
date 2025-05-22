<x-app-layout>

    <div class="p-6 ">

        <div class="flex justify-start mb-4 gap-4 ">
            <a href="{{ route('companies.index') }}" class="bg-gray-400 text-white p-2 rounded-md hover:bg-gray-600">&larr; Back</a>
        </div>

        <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 sm:grid-cols-2 gap-6">
            @csrf
            @method('PATCH')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $company->name) }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $company->email) }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700">Logo (upload new)</label>
                <input type="file" name="logo" id="logo"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('logo')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="website_url" class="block text-sm font-medium text-gray-700">Website</label>
                <input type="text" name="website_url" id="website_url" value="{{ old('website_url', $company->website_url) }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('website_url')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if($company->logo)
            <div class="col-span-2 flex items-center gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Logo Preview</label>
                    <img src="{{ Str::startsWith($company->logo, 'http') ? $company->logo : asset('storage/' . $company->logo) }}" 
                         alt="Company Logo" 
                         class="max-w-xs max-h-24 rounded-md shadow-md border border-gray-300">
                </div>
        
                <div class="flex flex-col justify-center">
                    <label for="remove_logo" class="text-sm font-medium text-red-600 cursor-pointer mb-1">Remove Logo?</label>
                    <button 
                        type="button" 
                        id="remove-logo-btn" 
                        class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                        onclick="document.getElementById('remove_logo').checked = true; this.disabled = true; this.innerText='Marked for removal';">
                        Remove Logo
                    </button>
                    <input type="checkbox" name="remove_logo" id="remove_logo" class="hidden" value="1">
                </div>
            </div>
        @endif
        

            <div class="flex justify-start mb-4 gap-4 col-span-2">
                <button type="submit" 
                        class="bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Cancel
                </button>
                <button type="submit" 
                        class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Update Company
                </button>
            </div>

        </form>
    </div>
</x-app-layout>
