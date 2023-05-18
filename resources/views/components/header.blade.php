<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
        <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
            {{ \App\Models\TextWidget::getTitle('header') }}
        </a>
        {!! \App\Models\TextWidget::getContent('header') !!}
    </div>
</header>
