@props([
    'article' => 'required',
    'class' => ''
])

<div class="card bg-base-100 shadow-md hover:shadow-lg transition-shadow duration-300 {{ $class }}">
    <div class="card-body">
    <div class="flex justify-between">
        @if($article->category)
        <div class="badge badge-secondary badge-outline mb-2">in {{ $article->category->name }}</div>
        @endif
        <div class="text-xs text-base-content/60">
            <span>{{ 'Takes about ' . $article->readingTime() . ' min to read' }}</span>
        </div>
    </div>
    <h2 class="card-title text-lg">{{ $article->title }}</h2>
    <p class="text-sm text-base-content/70 line-clamp-3">{{ Str::limit($article->content, 120) }}</p>
    <div class="flex items-center justify-between mt-4">
      <div class="text-xs text-base-content/60">
        @if($article->user)
        <span>by {{ $article->user->name }}</span> &bull;
        @endif
        <span>{{ $article->created_at->diffForHumans() }}</span>
      </div>
      <a href="{{ route('articles.show', $article) }}" class="btn btn-primary btn-sm">Read More</a>
    </div>
  </div>
</div>
