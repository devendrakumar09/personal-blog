<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Tag::orderBy('created_at','DESC')->simplePaginate(10);
        return view('Admin.tag.list')
                    ->with('data',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.tag.create');
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
            'title' => 'required|unique:tags|max:255',
            'description' => 'required|max:255',
        ]);

        $data = new Tag;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->slug = str_slug($request->title);
        $data->save();
        if ($data) {
            return back()->with('success','Tag Saved..');
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
        return redirect()->route('admin.tag.index')->with('success','All Categories...');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tag::find($id);
        return view('Admin.tag.edit')
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
            'title' => 'required|max:255|unique:tags,title,'.$id,
            'description' => 'required|max:255',
        ]);

        $data =  Tag::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->slug = str_slug($request->title);
        $data->save();
        if ($data) {
            return redirect()->route('admin.tag.index')->with('success','Tag Updated..');
        }else{
            return redirect()->route('admin.tag.index')->with('fail','Somthing Went Wrong..');
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
        $data =  Tag::find($id)->delete();
        if ($data) {
            return redirect()->route('admin.tag.index')->with('success','Tag Deleted..');
        }else{
            return redirect()->route('admin.tag.index')->with('fail','Somthing Went Wrong..');
        }
    }
}
