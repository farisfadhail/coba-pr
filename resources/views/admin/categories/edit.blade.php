<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit category') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-zinc-200 border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                        @method('PUT')
                        @csrf
                        <div>
                            <x-label class="block text-sm text-gray-600" for="name"/>Name
                            <x-input id="name" class="block w-full mt-1" name="name" type="text" value="{{ $category->name }}" required/>
                            @error('name')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <x-secondary-button>Submit</x-secondary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

