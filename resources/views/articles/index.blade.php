<x-layout>
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold mb-2">Articles</h1>
        <p class="text-base-content/70">Discover the latest stories and insights</p>
    </div>

    <form action="{{ route('articles.index') }}" method="GET" class="mb-8 flex flex-col sm:flex-row gap-4 items-center justify-center">
        <div class="form-control relative">
            <input type="text" name="search" placeholder="Search articles..." class="input input-bordered w-full sm:w-64 pr-8" value="{{ request('search') }}" />
            @if(request('search') || request('category'))
                <a href="{{ route('articles.index') }}" class="absolute right-3 top-1/2 -translate-y-1/2 btn btn-ghost btn-xs btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            @endif
        </div>
        <div class="form-control">
            <select name="category" class="select select-bordered w-full sm:w-48">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">
            Search
        </button>
    </form>

    @if($articles->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($articles as $article)
                <x-article.card :article="$article" />
            @endforeach
        </div>
        <div class="flex justify-center mt-10">
            <x-pagination :paginator="$articles" />
        </div>
    @else
        <div class="text-center py-20">
            <p class="text-lg text-base-content/60 mb-4">No articles found.</p>
            <a href="{{ route('articles.index') }}" class="btn btn-primary">View all articles</a>
        </div>
    @endif
</x-layout>