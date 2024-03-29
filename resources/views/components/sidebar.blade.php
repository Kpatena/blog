<!-- Sidebar Section -->
<aside class="w-full md:w-1/3 flex flex-col items-center px-3">
    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <h3 class="text-xl font-semibold mb-3">
            All Categories
        </h3>
        @foreach($categories as $category)
            <a href="{{ route('by-category', $category->slug) }}"
               class="text-semibold block py-2 px-3 rounded {{ request('category') && request('category')->slug === $category->slug ? 'bg-blue-600 text-white' : '' }}">
                {{ $category->title }} ({{ $category->total }})
            </a>
        @endforeach
    </div>
    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <a href="{{ route('about-us') }}" class="text-xl font-semibold pb-5">
            {{ \App\Models\TextWidget::getTitle('about-us-sidebar') }}
        </a>
        {!! \App\Models\TextWidget::getContent('about-us-sidebar') !!}
    </div>
</aside>
