<x-layout>
    <div class="hero py-20">
        <div class="hero-content text-center">
            <div class="max-w-2xl">
                <h1 class="text-5xl font-bold mb-6">Welcome to <span class="text-primary">BlogPersonnel</span></h1>
                <p class="text-lg text-base-content/70 mb-8">Discover amazing stories, share your thoughts, and connect with a community of writers.</p>
                <div class="flex gap-4 justify-center">
                    <a href="{{ route('articles.index') }}" class="btn btn-primary">Browse Articles</a>
                    @auth
                    <a href="{{ route('articles.create') }}" class="btn btn-outline">Write</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <div class="stats stats-vertical md:stats-horizontal shadow w-full mb-12">
        <div class="stat">
            <div class="stat-title">Articles</div>
            <div class="stat-value">{{ App\Models\Article::count() }}</div>
        </div>
        <div class="stat">
            <div class="stat-title">Categories</div>
            <div class="stat-value">{{ App\Models\Category::count() }}</div>
        </div>
        <div class="stat">
            <div class="stat-title">Writers</div>
            <div class="stat-value">{{ App\Models\User::count() }}</div>
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
