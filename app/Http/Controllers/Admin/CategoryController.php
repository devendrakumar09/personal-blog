<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at','DESC')->simplePaginate(10);
        return view('Admin.category.list')
                    ->with('data',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.category.create');
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
            'title' => 'required|unique:categories|max:255',
            'description' => 'required|max:255',
        ]);

        $data = new Category;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->slug = str_slug($request->title);
        $data->save();
        if ($data) {
            return back()->with('success','Category Saved..');
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
        return redirect()->route('admin.category.index')->with('success','All Categories...');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return view('Admin.category.edit')
                    ->with('data',$data);
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
            'title' => 'required|max:255|unique:categories,title,'.$id,
            'description' => 'required|max:255',
        ]);

        $data =  Category::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->slug = str_slug($request->title);
        $data->save();
        if ($data) {
            return redirect()->route('admin.category.index')->with('success','Category Updated..');
        }else{
            return redirect()->route('admin.category.index')->with('fail','Somthing Went Wrong..');
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
        $data =  Category::find($id)->delete();
        if ($data) {
            return redirect()->route('admin.category.index')->with('success','Category Deleted..');
        }else{
            return redirect()->route('admin.category.index')->with('fail','Somthing Went Wrong..');
        }
    }
}
