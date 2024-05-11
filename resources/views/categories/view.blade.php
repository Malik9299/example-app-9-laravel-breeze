<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('categories.update', $category) }}">
                        @method('PUT')
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="categoryName" :value="__('Category Name')" />
                            <x-text-input id="categoryName" class="block mt-1 w-full" type="text" name="categoryName" :value="$category->name" required autofocus autocomplete="categoryName" />
                            <x-input-error :messages="$errors->get('categoryName')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$category->description" required autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />

                            <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" :value="$category->is_active?'Active':'Inactive'" required autocomplete="status" />

                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Category Number')" />

                            <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" :value="optional($category->categoryNumber)->category_number" required autocomplete="status" />


                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Sub Categories')" />

                            @foreach ($category->subCategory as $subCategory)

                            <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" :value="$subCategory->name" required autocomplete="status" />

                            @endforeach


                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                        {{-- <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div> --}}
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
