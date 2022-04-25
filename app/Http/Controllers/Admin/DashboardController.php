<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artical;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at','DESC')->get();
        $tags = Tag::orderBy('created_at','DESC')->get();
        $articals = Artical::orderBy('created_at','DESC')->get();
        return view('Admin.dashboard')
                    ->with('categories',$categories)
                    ->with('tags',$tags)
                    ->with('articals',$articals);
    }
}
