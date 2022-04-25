<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Artical;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('title','ASC')->get();
        $categories = Category::orderBy('title','ASC')->get();
        $articals = Artical::orderBy('created_at','DESC')->simplePaginate(2);
        return view('index')
                    ->with('tags',$tags)
                    ->with('categories',$categories)
                    ->with('articals',$articals);
    }
    public function blogDetail($slug)
    {
        $data = Artical::where('slug',$slug)->first();
        $categories = Category::orderBy('title','ASC')->get();
        $articals = Artical::orderBy('created_at','DESC')->simplePaginate(2);
        return view('blog')
                ->with('data',$data)
                ->with('categories',$categories)
                ->with('articals',$articals);
    }


    public function about()
    {
        return view('about');
    }
}
