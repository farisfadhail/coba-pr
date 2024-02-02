<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About Me') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-700 border-b border-gray-200">
                    <div class="p-2 bg-gray-400 rounded-xl duration-300 shadow-lg hover:shadow-2xl">
                        <div class="p-2">
                            <div class="mb-5">
                                <a href="{{ route('index') }}" class="text-white bg-gray-500 px-3 py-1 rounded-md hover:bg-gray-600">Back</a>
                            </div>
                            <!-- Name -->
                            <h2 class="font-bold text-3xl mb-2" name='name'>Andika Ryan Nurshodiq</h2>
                            <!-- Origin -->
                            <p class="text-lg mb-2" name='origin'>Origin : Pamekasan</p>
                            <!-- University -->
                            <p class="text-lg mb-2" name='university'>University : Universitas Jember</p>
                            <!-- Phone Number -->
                            <p class="text-lg mb-2" name='phone'>Phone Number : 081216468204</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
