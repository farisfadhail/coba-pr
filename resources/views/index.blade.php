<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-700 border-b border-gray-200">
                    <div class=" p-2 bg-gray-400 rounded-xl duration-300 shadow-lg hover:shadow-2xl">
                        @forelse ( $articles as $article )
                            <div class="p-2">
                                <!-- Title -->
                                <h2 class="font-bold text-3xl mb-2 " name='title'>{{$article->title}}</h2>
                                <!-- Image -->
                                <img class="h-40 object-cover rounded-xl mb-2" src="{{asset('storage/'.$article->image)}}" name='image' alt="{{$article->title}}">
                                <!-- Tag -->
                                @if($article->tag)
                                    <h2 class="font-bold text-lg mb-2" name='tag'>
                                        @foreach($article->tag as $tag)
                                            #{{$tag->name}}
                                        @endforeach
                                    </h2>
                                @endif
                                <!-- Category -->
                                <h2 class="font-bold text-lg mb-2 " name='category'>Category : {{$article->category['name']}}</h2>
                                <!-- Description -->
                                <p class="text-sm text-zinc-950" name='full_text'>
                                    {{ Str::words($article->full_text, 20, '...') }}
                                </p>
                            </div>
                            <div class="mb-10">
                                <a href="{{ route('articles.show', ['article' => $article]) }}" class="text-white bg-gray-500 px-3 py-1  rounded-md hover:bg-gray-600 ">Read More</a>
                            </div>
                        @empty
                            <h1>INI KOSONG</h1>
                        @endforelse
                    </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
