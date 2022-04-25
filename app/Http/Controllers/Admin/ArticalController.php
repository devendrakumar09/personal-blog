<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artical;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticalController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Artical::orderBy('created_at','DESC')->simplePaginate(10);
        return view('Admin.artical.list')
                    ->with('data',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::orderBy('title','DESC')->get();
        $categories = Category::orderBy('title','DESC')->get();
        return view('Admin.artical.create')
                    ->with('tags',$tags)
                    ->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|max:255',
            'title' => 'required|unique:articals|max:255',
            'description' => 'required|max:255',
        ]);

        $data = new Artical;
        $data->cat_id = $request->category;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->slug = str_slug($request->title);        
        if ($request->hasFile('image')) {            
            $image = $request->image->store('public/artical');
            $data->image_path = $image;            
        }
        $data->save();
        if ($data) {
            $data->getTags()->attach($request->tags);
            return back()->with('success','Artical Saved..');
        }else{
            return back()->with('fail','Somthing Went Wrong..');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('admin.artical.index')->with('success','All Articals...');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::orderBy('title','DESC')->get();
        $categories = Category::orderBy('title','DESC')->get();
        $data = Artical::find($id);
        return view('Admin.artical.edit')
                    ->with('data',$data)
                    ->with('tags',$tags)
                    ->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category' => 'required|max:255',
            'title' => 'required|max:255|unique:articals,title,'.$id,
            'description' => 'required|max:255',
        ]);

        $data = Artical::find($id);
        $data->cat_id = $request->category;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->slug = str_slug($request->title);        
        if ($request->hasFile('image')) {            
            $image = $request->image->store('public/artical');
            $data->image_path = $image;            
        }
        $data->save();
        if ($data) {
            $data->getTags()->detach();
            $data->getTags()->attach($request->tags);
            return back()->with('success','Artical Updated..');
        }else{
            return back()->with('fail','Somthing Went Wrong..');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =  Artical::find($id);
        $data->getTags()->detach();
        $dataDell =  $data->delete();
        if ($dataDell) {
            return redirect()->route('admin.artical.index')->with('success','Category Deleted..');
        }else{
            return redirect()->route('admin.artical.index')->with('fail','Somthing Went Wrong..');
        }
    }
}
