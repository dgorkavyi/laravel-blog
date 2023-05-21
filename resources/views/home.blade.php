<x-layout>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        @foreach ($posts as $post)
            <x-blog-post :$post />
        @endforeach
        {{ $posts->links() }}
    </section>
    <x-sidebar />

</x-layout>
