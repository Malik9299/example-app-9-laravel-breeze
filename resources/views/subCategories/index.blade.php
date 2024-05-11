<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>

                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($subCategories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{$category->name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{$category->description}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{$category->category->name}}</td>

                              </tr>

                            @endforeach

                          <!-- More rows here -->
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
