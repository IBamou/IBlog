<x-layout>
    <article class="max-w-4xl mx-auto">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex gap-2">
                        <div class="badge badge-primary badge-outline">{{ $article->category->name }}</div>
                        @if($article->status === 'draft')
                        <div class="badge badge-warning">Draft</div>
                        @endif
                    </div>
                    <span class="text-sm text-base-content/60">{{ $article->created_at->format('F j, Y') }}</span>
                </div>

                <h1 class="text-4xl font-bold mb-6">{{ $article->title }}</h1>

                <div class="flex items-center gap-3 mb-8 pb-6 border-b border-base-300">
                    <div class="bg-primary text-primary-content rounded-full w-12 h-12 flex items-center justify-center">
                        <span class="text-lg font-semibold">{{ substr($article->user->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="font-medium">{{ $article->user->name }}</p>
                        <p class="text-sm text-base-content/60">Author</p>
                    </div>
                </div>

                <div class="prose prose-lg max-w-none">
                    <p class="whitespace-pre-wrap">{{ $article->content }}</p>
                </div>

                <div class="divider"></div>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('articles.index') }}" class="btn btn-ghost btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back
                    </a>
                    @auth
                    @can('update', $article)
                    @if($article->status === 'draft')
                    <form action="{{ route('articles.publish', $article) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            Publish
                        </button>
                    </form>
                    @endif
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-outline btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </a>
                    @endcan

                    @can('delete', $article)
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-error btn-outline btn-sm" onclick="return confirm('Are you sure you want to delete this article?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Delete
                        </button>
                    </form>
                    @endcan
                    @endauth
                </div>
            </div>
        </div>
    </article>
</x-layout>
