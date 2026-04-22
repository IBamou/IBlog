<x-layout>
    <div class="hero py-20">
        <div class="hero-content text-center">
            <div class="max-w-2xl">
                <h1 class="text-5xl font-bold mb-6">Welcome to <span class="text-neutral">I</span><span class="text-primary">Blog</span></h1>
                <p class="text-lg text-base-content/70 mb-8">Discover amazing stories, share your thoughts, and connect
                    with a community of writers.</p>
                <div class="flex gap-4 justify-center">
                    <a href="{{ route('articles.index') }}" class="btn btn-primary">Browse Articles</a>
                    @auth
                        <a href="{{ route('articles.create') }}" class="btn btn-outline">Write</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-12">
        <a href="{{ route('articles.index') }}"
            class="card bg-base-100 hover:shadow-lg transition-shadow cursor-pointer">
            <div class="card-body items-center p-4">
                <span class="text-3xl font-bold">{{ App\Models\Article::count() }}</span>
                <span class="text-sm text-base-content/60">Articles</span>
            </div>
        </a>
        <div class="card bg-base-100">
            <div class="card-body items-center p-4">
                <span class="text-3xl font-bold text-warning">{{ App\Models\Category::count()  }}</span>
                <span class="text-sm text-base-content/60">Categories</span>
            </div>
        </div>
        <div class="card bg-base-100">
            <div class="card-body items-center p-4">
                <span class="text-3xl font-bold text-success">{{ App\Models\User::count() }}</span>
                <span class="text-sm text-base-content/60">Writers</span>
            </div>
        </div>
    </div>

    <div class="text-center">
        <h2 class="text-2xl font-bold mb-6">Latest Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach(App\Models\Article::where('status', 'published')->latest()->take(3)->get() as $article)
                <x-article.card :article="$article" />
            @endforeach
        </div>
    </div>
</x-layout>