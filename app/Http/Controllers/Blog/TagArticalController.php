<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagArticalController extends Controller
{
    public function index($slug)
    {
        $data = Tag::where('slug',$slug)->first();
        $categories = Category::orderBy('title','ASC')->get();        
        return view('tag')
                ->with('data',$data)
                ->with('categories',$categories);
    }
}
