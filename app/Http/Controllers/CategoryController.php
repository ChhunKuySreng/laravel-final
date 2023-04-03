<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;

use Illuminate\Http\Request;

class CategoryController extends Controller
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
     * Show the application category.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    protected function index()
    {
        $categories = CategoryModel::orderBy('id', 'desc')->get();
        return view('backend.category.index', compact('categories'));
    }

    protected function create()
    {
        return view('backend.category.create');
    }

    protected function store(Request $request, CategoryModel $category)
    {
        $request->validate([
            'cat_id'=>'required',
            'cat_name'=>'required',
        ]);
        $category = new CategoryModel();
        $category->cat_id = $request->cat_id;
        $category->cat_name = $request->cat_name;
        $category->cat_description = $request->cat_description;
        $category->save();
        return redirect('category')->with('success','Category Created Successfully.');
    }

    protected function edit($id)
    {
        $category = CategoryModel::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    protected function update(Request $request, CategoryModel $category)
    {
        $request->validate([
            'cat_id'=>'required',
            'cat_name'=>'required',
        ]);
        $category->cat_id = $request->cat_id;
        $category->cat_name = $request->cat_name;
        $category->cat_description = $request->cat_description;
        $category->save();
        return redirect('category')->with('success','Category Update Successfully.');
    }

    protected function destroy($id)
    {
        $category = CategoryModel::where('id', $id)->delete();
        return redirect('category');
    }
}
