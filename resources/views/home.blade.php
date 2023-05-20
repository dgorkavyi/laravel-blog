<x-layout>
    @foreach ($posts as $post)
        <x-blog-post :$post />
    @endforeach
</x-layout>
