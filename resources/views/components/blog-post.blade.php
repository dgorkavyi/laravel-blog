<article class="flex w-full flex-col shadow my-4">
    <a href="{{route('post.show', $post)}}" class="w-full block hover:opacity-75">
            <img src="{{ asset($post->getThumbnail()) }}">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        @foreach ($post->categories as $category)
            <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$category->title}}</a>
        @endforeach
        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
        <p href="#" class="text-sm pb-3">Published on {{ $post->getFormattedDate() }}, by <b>{{$post->user->name}}</b></p>
        <a href="#" class="pb-6">{!! $post->getPostItemContent() !!}</a>
        <a href="{{route('post.show', $post)}}" class="uppercase text-gray-800 hover:text-black">
            Continue Reading
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</article>
