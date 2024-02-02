<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category List') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-zinc-200 border-b border-gray-200">
                    <div class="mb-4">
                        <x-link href="{{ route('admin.categories.create') }}">
                            Create
                        </x-link>
                    </div>
                    <table class="w-full text-left border-collapse">
                        <thead>
                        <tr>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-zinc-300 border-b text-gray-dark border-gray-light">
                                #
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-zinc-300 border-b text-gray-dark border-gray-light">
                                Name
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-zinc-300 border-b text-gray-dark border-gray-light"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $counter = 0;
                        @endphp
                        @foreach ($categories as $category)
                        @php
                            $counter += 1;
                        @endphp
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200">{{ $counter }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $category->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    <x-link href="{{ route('admin.categories.edit', $category->id) }}">
                                        Edit
                                    </x-link>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <x-secondary-button>Delete</x-secondary-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
