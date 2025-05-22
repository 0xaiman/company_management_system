<x-app-layout>
   

    <div class="p-6 ">

        <div class="flex justify-between mb-4 gap-4 ">
            <a href="{{ route('companies.index') }}" class=" bg-gray-400 text-white p-2 rounded-md hover:bg-gray-600">&larr; Back</a>
            <a href="{{ route('companies.edit', $company) }}" 
            class="bg-blue-400 text-white px-4 py-2 rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-green-500">
             Edit Company
         </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 gap-6 ">

            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" value="{{ $company->name }}" disabled
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-800">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" value="{{ $company->email }}" disabled
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-800">
            </div>

          

            <div>
                <label class="block text-sm font-medium text-gray-700">Logo Path</label>
                <input type="text" 
                    value="{{ Str::startsWith($company->logo, 'http') ? $company->logo : asset('storage/' . $company->logo) }}" 
                    disabled
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-800">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Website</label>
                <input type="text" value="{{ $company->website_url }}" disabled
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-800">
            </div>

            @if($company->logo)
              

                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Logo Preview</label>
                    <img src="{{ Str::startsWith($company->logo, 'http') ? $company->logo : asset('storage/' . $company->logo) }}" 
                         alt="Company Logo" 
                         class="max-w-xs max-h-24 rounded-md shadow-md border border-gray-300">
                </div>
            @endif

           

        </div>
    </div>
</x-app-layout>
