<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderby('id','DESC')->paginate(15);

        $data = [
            'tags' => $tags
        ];

        return view('admin.tags.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name','ASC')->pluck('name','id');

        $data = [
            'categories' => $categories
        ];
        return view('admin.tags.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:tags|max:20',
            'category_id'=>'required|max:20' 
        ]);
        $tag = new Tag;
        $tag->name = e($request->name);
        $tag->category_id = e($request->category_id);
        $tag->slug = Str::slug($request->name);
        $tag->save();

        return redirect()->route('tags.index')->with('info','Agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }
    public function category_id($category_id)
    {
        $tags = Tag::where('category_id', $category_id)->orderby('id','DESC')->paginate();
        
        $data = [
            'tags' => $tags
        ];

        return view('admin.tags.index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        $categories = Category::orderBy('name','ASC')->pluck('name','id');

        $data = [
            'tag' => $tag,
            'categories'=> $categories
        ];

        return view('admin.tags.edit',$data);

        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:20',
            'category_id'=>'required|max:20' 
        ]);
        $tag = Tag::where('id', $id)->firstOrFail();
        $tag->name = e($request->name);
        $tag->category_id = e($request->category_id);
        $tag->slug = Str::slug($request->name);
        $tag->save();

        return redirect()->route('tags.index')->with('info','Agregado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::where('id', $id)->firstOrFail()->delete();
        return redirect()->route('tags.index')->with('info','Borrado correctamente');
  
    }
}
