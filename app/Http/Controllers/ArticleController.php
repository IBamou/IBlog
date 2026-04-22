<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Article::where('status', 'published');

        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $articles = $query->paginate(6)->appends($request->query());
        $categories = Category::all();
        return view('articles.index', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'status' => 'in:published,draft'
        ]);

        $validated['user_id'] = Auth::id();
        $status = $request->input('status');
        $validated['status'] = $status;

        if ($validated['status'] === 'published') {
            $validated['published_date'] = now();
        }
        
        Article::create($validated);
        return redirect()->route('my.articles', ['status' => $validated['status']])->with('success', 'Article created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article = Article::findOrFail($article->id);

        if ($article->status === 'draft' && (!Auth::check() || Auth::id() !== $article->user_id)) {
            abort(404);
        }

        $writer = User::findOrFail($article->user_id);
        $category = Category::findOrFail($article->category_id);
        return view('articles.show', compact('article', 'writer', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if (!Auth::check() || Auth::id() !== $article->user_id) {
            abort(404);
        }
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if (!Auth::check() || Auth::id() !== $article->user_id) {
            abort(404);
        }
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
        ]);

        $validated['status'] = $request->input('status') ?? $article->status;

        $article->update($validated);
        return redirect()->route('my.articles', ['status' => $validated['status']])->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if (!Auth::check() || Auth::id() !== $article->user_id) {
            abort(404);
        }
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }

    public function publish(Article $article)
    {
        if (!Auth::check() || Auth::id() !== $article->user_id) {
            abort(404);
        }
        $article->update([
            'status' => 'published',
            'published_date' => now()
        ]);
        return redirect()->back()->with('success', 'Article published successfully.');
    }

    public function myArticles($status = 'published', Request $request)
    {
        $query = Article::where('user_id', Auth::id())
            ->where('status', $status);

        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $articles = $query->paginate(6)->appends($request->query());
        $categories = Category::all();
        return view('articles.my', compact('articles', 'status', 'categories'));
    }
}
