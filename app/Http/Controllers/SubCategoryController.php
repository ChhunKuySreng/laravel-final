<?php

namespace App\Http\Controllers;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application subcategory.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    protected function index()
    {
        $categories = CategoryModel::all();
        $subcategories = SubCategoryModel::orderBy('id', 'desc')->get();
        return view('backend.subcategory.index', compact(['subcategories', 'categories']));
    }

    protected function create()
    {
        $categories = CategoryModel::all();
        return view('backend.subcategory.create',compact('categories'));
    }

    protected function store(Request $request, SubCategoryModel $subcategory)
    {
        $request->validate([
            'sub_cat_name'=>'required',
            'cat_id'=>'required',
        ]);
        $subcategory = new SubCategoryModel();
        $subcategory->sub_cat_name = $request->sub_cat_name;
        $subcategory->cat_id = $request->cat_id;
        $subcategory->sub_cat_description = $request->sub_cat_description;
        $subcategory->save();
        return redirect('subcategory')->with('success','Sub Category Created Successfully.');
    }

    protected function edit($id)
    {
        $subcategory = SubCategoryModel::find($id);
        $categories = CategoryModel::all();
        return view('backend.subcategory.edit', compact(['categories', 'subcategory']));
    }

    protected function update(Request $request, SubCategoryModel $subcategory)
    {
        $request->validate([
            'sub_cat_name'=>'required',
            'cat_id'=>'required',
        ]);
        $subcategory->sub_cat_name = $request->sub_cat_name;
        $subcategory->cat_id = $request->cat_id;
        $subcategory->sub_cat_description = $request->sub_cat_description;
        $subcategory->save();
        return redirect('subcategory')->with('success','Sub Category Update Successfully.');
    }

    protected function destroy($id)
    {
        $subcategory = SubCategoryModel::where('id', $id)->delete();
        return redirect('subcategory')->with('success','Sub Category Delete Successfully.');
    }

}
