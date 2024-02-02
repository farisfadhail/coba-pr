<!-- resources/views/articles/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article Detail') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-400 border-b border-gray-200">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-5">
                            <a href="{{ route('index') }}" class="text-white bg-gray-500 px-3 py-1 rounded-md hover:bg-gray-600">Back to Home</a>
                        </div>
                        <h2 class="font-bold text-4xl mb-2 text-zinc-950">{{$article->title}}</h2>
                        <h2 class="font-bold text-lg mb-2 text-zinc-950">Category : {{$article->category['name']}}</h2>
                        <p class="text-sm text-zinc-950">{{$article->full_text}}</p>
                    </div>
                    <div class="p-6 bg-gray-400 overflow-hidden shadow-sm sm:rounded-lg">
                        <img class="h-40 object-cover rounded-xl" src="{{asset('storage/'.$article->image)}}" name='image' alt="{{$article->title}}">
                        <div class="mt-4">
                            @if($article->tag)
                                <h2 class="font-bold text-lg mb-2">Tags:</h2>
                                <div class="flex space-x-2">
                                    @foreach($article->tag as $tag)
                                        <span class="px-2 py-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded">{{$tag->name}}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
