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
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category Number</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">View</th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($categories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{$category->name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{$category->description}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{optional($category->categoryNumber)->category_number}}</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{$category->is_active?"bg-green-100 text-green-800":"bg-red-100 text-red-800"}} ">{{$category->is_active?"Active":"Inactive"}}</span></td>
                                <td class="px-6 py-4 whitespace-nowrap"><a href="{{route('categories.edit', $category->id)}}"> Edit</a></td>
                                <td class="px-6 py-4 whitespace-nowrap"><a href="{{route('categories.show', $category->id)}}"> View</a></td>
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
