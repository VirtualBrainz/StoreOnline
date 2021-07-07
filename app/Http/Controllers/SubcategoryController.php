<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::orderby('id','DESC')->paginate(15);

        $data = [
            'subcategories' => $subcategories
        ];

        return view('admin.subcategories.index',$data);
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
        return view('admin.subcategories.create', $data);
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
            'name'=>'required|unique:subcategories|max:20',
            
        ]);
        $category = new Subcategory;
        $category->name = e($request->name);
        $category->category_id = e($request->category_id);
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('subcategories.index')->with('info','Agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $category)
    {
        //
    }
    public function category_id($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->orderby('id','DESC')->paginate();

        $data = [
            'subcategories' => $subcategories
        ];

        return view('admin.subcategories.index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::where('id', $id)->firstOrFail();
        $categories = Category::orderBy('name','ASC')->pluck('name','id');

        $data = [
            'subcategory' => $subcategory,
            'categories' => $categories
        ];

        return view('admin.subcategories.edit',$data);

        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:20',
            'category_id'=>'required' 
        ]);
        $category = Subcategory::where('id', $id)->firstOrFail();
        $category->name = e($request->name);
        $category->category_id = e($request->category_id);
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('subcategories.index')->with('info','Agregado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Subcategory::where('id', $id)->firstOrFail()->delete();
        return redirect()->route('subcategories.index')->with('info','Borrado correctamente');
  
    }
}
