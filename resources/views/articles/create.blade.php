<x-layout>
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Write an Article</h1>
        <form action="{{ route('articles.store' ) }}" method="POST" class="space-y-6">
            @csrf
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Title</span>
                </label>
                <input type="text" name="title" placeholder="Enter title" class="input input-bordered w-full" required />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Category</span>
                </label>
                <select name="category_id" class="select select-bordered w-full">
                    <option value="">Select category</option>
                    @foreach(App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-control">
                <label class="label ">
                    <span class="label-text">Content</span>
                </label>
                <br>
                <textarea name="content" class="textarea textarea-bordered h-48 w-full" placeholder="Write your article..."></textarea>
            </div>
            <div class="flex gap-4">
                <button type="submit" name="status" value="published" class="btn btn-primary">Publish</button>
                <button type="submit" name="status" value="draft" class="btn">Save as Draft</button>
            </div>
        </form>
    </div>
</x-layout>
