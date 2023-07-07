<article class="flex flex-col shadow my-4 bg-white">
    <!-- Article Image -->
    <a href="{{ route('view', $post) }}" class="hover:opacity-75 w-100 m-auto">
        <img src="{{ $post->getThumbnail() }}" alt="{{ $post->thumbnail }}">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        <div class="flex gap-4">
            @foreach($post->categories as $category)
                <a href="{{ route('by-category', $category->slug) }}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$category->title}}</a>
            @endforeach
        </div>

        <a href="{{ route('view', $post) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">
            {{ $post->title }}
        </a>
        <a href="{{ route('view', $post) }}" class="text-sm pb-3">
            By <span class="font-semibold hover:text-gray-800">{{ $post->user->name }}</span>,
            Published on {{ $post->published_at->toFormattedDateString() }}
        </a>
        <a href="{{ route('view', $post) }}" class="pb-6">
            {{ $post->shortBody() }}
        </a>
        <a href="{{ route('view', $post) }}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
    </div>
</article>
