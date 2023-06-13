<x-app-layout :meta-title="$widget->meta_title ?: $widget->title" :meta-description="$widget->meta_description ?: 'About Beemou'">
    <section class="w-full flex flex-col items-center px-3">
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <div class="m-auto inline-block">
                <img class="w-fit" src="{{ $widget->getImage() }}"  alt=""/>
            </div>

            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">
                    {{ $widget->title }}
                </a>
                <div>
                    {!! $widget->content !!}
                </div>
            </div>
        </article>
    </section>
</x-app-layout>
