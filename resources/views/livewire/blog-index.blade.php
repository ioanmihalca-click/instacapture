<div class="space-y-8">
    <h1 class="text-4xl font-bold text-red-800">Blog Posts</h1>

<div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
    @foreach($blogs as $blog)
        <article class="overflow-hidden transition duration-300 bg-gray-800 bg-opacity-50 rounded-lg shadow-lg hover:shadow-2xl">
            @if($blog->cover_image)
                <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}" class="object-cover w-full h-48">
            @else
                <div class="w-full h-48 bg-gray-800"></div>
            @endif
            <div class="p-6">
                <h2 class="mb-2 text-xl font-bold text-red-800 transition duration-300 line-clamp-1 hover:text-red-600">
                    <a href="{{ route('blog.show', $blog->slug) }}">
                        {{ $blog->title }}
                    </a>
                </h2>
                <p class="mb-4 text-sm text-gray-400">
                    Published on {{ $blog->published_at->format('F j, Y') }}
                </p>
                <div class="mb-4 text-gray-300 line-clamp-3">
                    {!! strip_tags($blog->content) !!}
                </div>
                <a href="{{ route('blog.show', $blog->slug) }}" class="inline-block px-4 py-2 text-white transition duration-300 bg-red-800 rounded hover:bg-red-700">
                    Read more
                </a>
            </div>
        </article>
    @endforeach
    </div>
</div>