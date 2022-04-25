<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryArticalController extends Controller
{
    public function index($slug)
    {
        $data = Category::where('slug',$slug)->first();
        $categories = Category::orderBy('title','ASC')->get();        
        return view('categories')
                ->with('data',$data)
                ->with('categories',$categories);
    }
}
