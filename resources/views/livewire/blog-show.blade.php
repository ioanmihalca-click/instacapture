<div>
    <article class="max-w-5xl mx-auto">
        @if($blog->cover_image)
            <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}" class="w-full h-auto mb-6 rounded-lg shadow-md">
        @endif
        <h1 class="mb-4 text-3xl font-bold">{{ $blog->title }}</h1>
        <p class="mb-4 text-gray-600">Published on {{ $blog->published_at->format('F j, Y') }} by Snow 'n' Stuff</p>
        <div class="prose max-w-none">
            {!! $blog->content !!}
        </div>
    </article>

    @if($relatedArticles->isNotEmpty())
        <div class="max-w-5xl mx-auto mt-12">
            <h2 class="mb-6 text-2xl font-bold text-red-800">Related Articles</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($relatedArticles as $article)
                    <article class="overflow-hidden transition duration-300 bg-gray-800 bg-opacity-50 rounded-lg shadow-lg hover:shadow-2xl">
                        @if($article->cover_image)
                            <img src="{{ asset('storage/' . $article->cover_image) }}" alt="{{ $article->title }}" class="object-cover w-full h-48">
                        @else
                            <div class="w-full h-48 bg-gray-800"></div>
                        @endif
                        <div class="p-6">
                            <h3 class="mb-2 text-xl font-bold text-red-800 transition duration-300 line-clamp-1 hover:text-red-600">
                                <a href="{{ route('blog.show', $article->slug) }}">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            <p class="mb-4 text-sm text-gray-400">
                                Published on {{ $article->published_at->format('F j, Y') }}
                            </p>
                            <div class="mb-4 text-gray-300 line-clamp-3">
                                {!! strip_tags($article->content) !!}
                            </div>
                            <a href="{{ route('blog.show', $article->slug) }}" class="inline-block px-4 py-2 text-white transition duration-300 bg-red-800 rounded hover:bg-red-700">
                                Read more
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    @endif

    <div class="max-w-5xl mx-auto mt-8">
        <a href="{{ route('blog.index') }}" class="inline-block text-blue-600 hover:underline">Back to all posts</a>
    </div>
</div>