<div class="container px-4 mx-auto md:py-12 max-w-7xl">
    <h1 class="mb-12 text-3xl font-bold text-center text-yellow-400 uppercase md:text-5xl font-roboto-condensed">
        Articole pe Blog
    </h1>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach($blogs as $blog)
            <article class="overflow-hidden transition duration-300 transform bg-gray-800 shadow-lg rounded-xl hover:scale-105 hover:shadow-2xl">
                <div class="relative">
                    @if($blog->cover_image)
                        <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}" class="object-cover w-full h-auto">
                    @else
                        <div class="flex items-center justify-center w-full h-56 bg-gray-700">
                            <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute top-0 right-0 px-3 py-1 m-2 text-xs font-bold text-black bg-yellow-400 rounded-full">
                        {{ $blog->published_at->format('d M Y') }}
                    </div>
                </div>
                <div class="p-6">
                    <h2 class="mb-3 text-2xl font-bold text-yellow-400 transition duration-300 line-clamp-2 hover:text-yellow-300">
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            {{ $blog->title }}
                        </a>
                    </h2>
                    <div class="mb-4 text-gray-300 line-clamp-3">
                        {!! strip_tags($blog->content) !!}
                    </div>
                    <a href="{{ route('blog.show', $blog->slug) }}" class="inline-block px-6 py-2 font-semibold text-black transition duration-300 bg-yellow-400 rounded-full hover:bg-yellow-300 hover:shadow-lg">
                        Citește mai mult
                    </a>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-12">
        {{ $blogs->links() }}
    </div>
</div>

