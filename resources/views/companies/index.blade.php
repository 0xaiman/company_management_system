<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Companies</h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('companies.create') }}" class=" bg-gray-500 text-white p-2 rounded-md hover:bg-gray-600">Create Company</a>

        <table class="table-auto w-full m-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Logo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td><a href="{{ $company->website_url }}" target="_blank">{{ $company->website_url }}</a></td>
                    <td>
                        @if ($company->logo)
                        <img
                            src="{{ Str::startsWith($company->logo, ['http://', 'https://']) ? $company->logo : asset('storage/' . $company->logo) }}"
                            alt="{{ $company->name }}"
                            class="w-20 h-20 object-contain"
                        />

                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
