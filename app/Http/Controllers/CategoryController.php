<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        return view('/admin/news/category');
    }

    public function categoryStore(Request $request)
    {
        Category::create([
            'category' => $request->category,
            'slug' => $request->slug,
        ]);

        return redirect('/admin/articles/create');
    }
}
