<x-layout>
    <div class="max-w-3xl mx-auto">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h1 class="text-3xl font-bold mb-6">Write an Article</h1>
                
                <form action="{{ route('articles.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Title</span>
                        </label>
                        <input type="text" name="title" placeholder="Enter an engaging title" class="input input-bordered w-full focus:input-primary @error('title') input-error @enderror" required />
                        <x-toasts.error name="title" />
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Category</span>
                        </label>
                        <select name="category_id" class="select select-bordered w-full focus:select-primary @error('category_id') select-error @enderror">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-toasts.error name="category_id" />
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Content</span>
                        </label>
                        <textarea name="content" class="textarea textarea-bordered h-64 w-full focus:textarea-primary @error('content') textarea-error @enderror" placeholder="Write your article here..."></textarea>
                        <x-toasts.error name="content" />
                    </div>
                    
                    <input type="hidden" name="status" id="status" value="draft">
                    
                    <div class="divider"></div>
                    
                    <div class="flex flex-wrap gap-3">
                        <button type="submit" class="btn btn-primary" onclick="document.getElementById('status').value='published'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            Publish
                        </button>
                        <button type="submit" class="btn btn-outline" onclick="document.getElementById('status').value='draft'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5v12h16V7h-3m1-5H4a2 2 0 00-2 2v14a2 2 0 002 2h16a2 2 0 002-2V4a2 2 0 00-2-2z" />
                            </svg>
                            Save as Draft
                        </button>
                        <a href="{{ route('articles.index') }}" class="btn btn-ghost">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>