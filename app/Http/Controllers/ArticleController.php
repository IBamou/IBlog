<?php

namespace App\Http\Controllers;

use App\Models\Article;
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

        if ($validated['status'] === 'published') {
            $validated['published_date'] = now();
        }
        $user = Auth::user();
        $validated['user_id'] = $user->id;
        Article::create($validated);
        return redirect()->route('my.articles', ['status' => $validated['status']])->with('success', 'Article created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        Gate::authorize('update', $article);
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        Gate::authorize('update', $article);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
        ]);

        $article->update($validated);
        return redirect()->route('my.articles', ['status' => $validated['status']])->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Gate::authorize('delete', $article);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }

    public function publish(Article $article)
    {
        Gate::authorize('update', $article);
        $article->update([
            'status' => 'published',
            'published_date' => now()
        ]);
        return redirect()->back()->with('success', 'Article published successfully.');
    }

    public function myArticles($status = 'published', Request $request)
    {
        $user = Auth::user();
        $query = Article::where('user_id', $user->id)->where('status', $status);

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
