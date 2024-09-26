<div class="space-y-8">
    <h1 class="text-2xl font-bold text-center text-yellow-400 uppercase md:text-4xl font-roboto-condensed">Articole pe Blog</h1>

<div class="grid grid-cols-1 gap-8 p-4 md:grid-cols-2 lg:grid-cols-3">
    @foreach($blogs as $blog)
        <article class="overflow-hidden transition duration-300 bg-gray-700 bg-opacity-50 rounded-lg shadow-lg hover:shadow-2xl">
            @if($blog->cover_image)
                <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}" class="object-cover w-full h-48">
            @else
                <div class="w-full h-48 bg-gray-800"></div>
            @endif
            <div class="p-6">
                <h2 class="mb-2 text-xl font-bold text-yellow-400 transition duration-300 line-clamp-1 hover:text-yellow-300">
                    <a href="{{ route('blog.show', $blog->slug) }}">
                        {{ $blog->title }}
                    </a>
                </h2>
                <p class="mb-4 text-sm text-gray-400">
                    Publicat pe {{ $blog->published_at->format('F j, Y') }}
                </p>
                <div class="mb-4 text-gray-300 line-clamp-3">
                    {!! strip_tags($blog->content) !!}
                </div>
                <a href="{{ route('blog.show', $blog->slug) }}" class="inline-block px-4 py-2 text-black transition duration-300 bg-yellow-400 rounded hover:bg-yellow-300">
                    Citeste mai mult
                </a>
            </div>
        </article>
    @endforeach
    </div>
</div>