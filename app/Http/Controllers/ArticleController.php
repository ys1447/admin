<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function article()
    {
        $articles = Article::with('category')->orderBy('created_at', 'desc')->get();
        return view('/admin/news/articles', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('/admin/news/create', [
            'categories' => $categories,
        ]);

    }

    public function createStore(Request $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'body' => $request->body
        ]);

        // Mengolah tag
        $tagNames = explode(',', $request->name);
        $tagIds = [];

        foreach ($tagNames as $tagName) {
            $tagName = trim($tagName);
            if (!empty($tagName)) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
        }

        // Mengaitkan artikel dengan tag
        $article->tags()->sync($tagIds);

        return redirect()->back();
    }

    public function categories()
    {
        $categories = Category::with('article')->get();
        return view('/admin/news/categories', compact('categories'));
    }

}