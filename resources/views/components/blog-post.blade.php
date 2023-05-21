<article class="flex flex-col shadow my-4">
    <a href="#" class="hover:opacity-75">
        <img src="{{ asset($post->getThumbnail()) }}">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Sports</a>
        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
        <p href="#" class="text-sm pb-3">Published on {{ $post->getFormattedDate() }}, by <b>{{$post->user->name}}</b></p>
        <a href="#" class="pb-6">{{ iconv('utf-8', 'ascii//TRANSLIT', $post->getPostItemContent()) }}</a>
        <a href="#" class="uppercase text-gray-800 hover:text-black">
            Continue Reading
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</article>
