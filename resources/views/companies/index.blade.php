<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Companies</h2>
    </x-slot>

    <div class="p-6 ">
        <div class="flex justify-end mb-4 w-full xl:w-2/3 mx-auto">
            <a href="{{ route('companies.create') }}" class=" bg-gray-500 text-white p-2 rounded-md hover:bg-gray-600">Create Company</a>
        </div>

        <table class="w-full xl:w-2/3 text-md text-left text-gray-600 mx-auto">
            <thead class="bg-gray-100 text-xs uppercase font-semibold text-gray-700">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Website</th>
                    <th class="px-4 py-2 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($companies as $index => $company)
                    <tr>
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                       
                        <td class="px-4 py-2 font-medium text-gray-800">{{ $company->name }}</td>
                        <td class="px-4 py-2">{{ $company->email }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ $company->website_url }}" class="text-blue-600 hover:underline" target="_blank">{{ $company->website_url }}</a>
                        </td>
                        <td class="px-4 py-2 text-right space-x-2">
                            <a href="{{ route('companies.show', $company) }}" class="text-indigo-600 hover:underline">View</a>
                            <a href="{{ route('companies.edit', $company) }}" class="text-gray-500 hover:underline">Edit</a>
                            <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
</x-app-layout>
