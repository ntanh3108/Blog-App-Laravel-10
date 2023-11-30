@props(['post'])
<div class="">
    <a href="http://127.0.0.1:8000/blog/laravel-34">
        <div>
            <img class="w-full rounded-xl"
                src="{{ $post->getThumbnail() }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-3">
            @if ($category = $post->categories()->first())
                <x-badge wire:navigate href="{{route('post.index', ['category' => $category->slug])}}" :textColor='$category->text_color' :bgColor='$category->bg_color'>
                    {{ $category->title }}
                </x-badge>
            @endif
            <p class="text-gray-500 text-sm">{{$post->published_at}}</p>
        </div>
        <a href="#" class="text-xl font-bold text-gray-900">{{$post->title}}</a>
    </div>
</div>