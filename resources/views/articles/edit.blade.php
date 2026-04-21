@props(['article'=>'required'])

<x-layout>
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Edit Article ({{ $article->status }})</h1>
        <form action="{{ route('articles.update', $article->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Title</span>
                </label>
                <input type="text" name="title" placeholder="Enter title" class="input input-bordered w-full" required value="{{ $article->title }}" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Category</span>
                </label>
                <select name="category_id" class="select select-bordered w-full">
                    <option value="">Select category</option>
                    @foreach(App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Content</span>
                </label>
                <textarea name="content" class="textarea textarea-bordered h-48 w-full" placeholder="Write your article...">{{ $article->content }}</textarea>
            </div>
            <div class="flex gap-4">
                <button type="submit" name="status" value="published" class="btn btn-primary">Republish</button>
                <button type="submit" name="status" value="draft" class="btn">Save as Draft</button>
                <a href="{{ route('my.articles', $article->status) }}" class="btn btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
