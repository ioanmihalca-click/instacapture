<div class="text-gray-100">
    <div class="container max-w-4xl px-4 py-12 mx-auto">
        <article class="overflow-hidden bg-gray-800 shadow-2xl rounded-xl">
            @if($blog->cover_image)
                <div class="relative">
                    <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}" class="object-cover w-full h-auto">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                </div>
            @endif
            <div class="p-8">
                <h1 class="mb-4 text-4xl font-bold text-yellow-400 md:text-5xl">{{ $blog->title }}</h1>
                <div class="flex items-center mb-8 text-gray-400">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Publicat pe {{ $blog->published_at->format('d F Y') }} de InstaCapture</span>
                </div>
                <div class="prose prose-lg prose-invert max-w-none">
                    {!! $blog->content !!}
                </div>
            </div>
        </article>

        @if($relatedArticles->isNotEmpty())
            <div class="mt-16">
                <h2 class="mb-8 text-3xl font-bold text-yellow-400">Articole similare</h2>
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($relatedArticles as $article)
                        <article class="overflow-hidden transition duration-300 transform bg-gray-800 shadow-lg rounded-xl hover:scale-105">
                            <div class="relative">
                                @if($article->cover_image)
                                    <img src="{{ asset('storage/' . $article->cover_image) }}" alt="{{ $article->title }}" class="object-cover w-full h-auto">
                                @else
                                    <div class="flex items-center justify-center w-full h-48 bg-gray-700">
                                        <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                <div class="absolute top-0 right-0 px-3 py-1 m-2 text-xs font-bold text-black bg-yellow-400 rounded-full">
                                    {{ $article->published_at->format('d M Y') }}
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="mb-2 text-xl font-bold text-yellow-400 transition duration-300 line-clamp-2 hover:text-yellow-300">
                                    <a href="{{ route('blog.show', $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <div class="mb-4 text-gray-300 line-clamp-3">
                                    {!! strip_tags($article->content) !!}
                                </div>
                                <a href="{{ route('blog.show', $article->slug) }}" class="inline-block px-4 py-2 font-semibold text-black transition duration-300 bg-yellow-400 rounded-full hover:bg-yellow-300">
                                    Citește mai mult
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="mt-12 text-center">
            <a href="{{ route('blog.index') }}" class="inline-block px-6 py-3 font-semibold text-yellow-400 transition duration-300 bg-gray-700 rounded-full hover:bg-gray-600 hover:text-yellow-300">
                Înapoi la toate articolele
            </a>
        </div>
    </div>
</div>

