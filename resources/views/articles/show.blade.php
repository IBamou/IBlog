<x-layout>
    <article class="max-w-3xl mx-auto">
        <div class="mb-8">
            <div class="badge badge-secondary badge-outline mb-4">{{ $category->name }}</div>
            <h1 class="text-4xl font-bold mb-4">{{ $article->title }}</h1>
            <div class="flex items-center gap-4 text-base-content/70">
                <div class="flex items-center gap-2">
                    <div class="avatar placeholder">
                        <div class="bg-neutral text-neutral-content rounded-full w-8">
                            <span class="text-xs">{{ substr($writer->name, 0, 1) }}</span>
                        </div>
                    </div>
                    <span>{{ $writer->name }}</span>
                </div>
                <span>&bull;</span>
                <span>{{ $article->created_at->format('F j, Y') }}</span>
            </div>
        </div>
        <div class="prose prose-lg max-w-none">
            <p>{{ $article->content }}</p>
        </div>
        <div class="divider"></div>
        <div class="flex gap-4">
            <a href="{{ route('articles.index') }}" class="btn btn-ghost btn-sm">&larr; Back to Articles</a>
            @auth
            @can('update', $article)
            <a href="{{ route('articles.edit', $article) }}" class="btn btn-outline btn-sm">Edit</a>
            @endcan

            @can('delete', $article)
            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline btn-sm">Delete</button>
            </form>
            @endcan
            @endauth
        </div>
    </article>
</x-layout>
