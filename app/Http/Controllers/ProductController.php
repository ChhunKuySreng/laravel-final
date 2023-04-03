<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class ProductController extends Controller
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
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = CategoryModel::select(array('cat_id','cat_name'))->get();
        $products = ProductModel::orderBy('id', 'desc')->get();
        return view('backend.product.index', compact(['products','categories']));
    }

    public function create()
    {
        $categories = CategoryModel::select(array('cat_id','cat_name'))->get();
        return view('backend.product.create', compact('categories'));
    }

    public function store(Request $request, ProductModel $product)
    {
        $request->validate([
            'prod_name'=>'required',
            'prod_description'=>'required',
            'prod_qty'=>'required',
            'prod_price'=>'required',
            'cat_id'=>'required',
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        // $input = $request->all();
        $product = new ProductModel();
        $product->prod_name = $request->prod_name;
        $product->prod_description = $request->prod_description;
        $product->prod_size = $request->prod_size;
        $product->prod_qty = $request->prod_qty;
        $product->prod_price = $request->prod_price;
        $product->cat_id = $request->cat_id;
        $product->prod_status = $request->prod_status;
        $product->prod_barcode = ProductModel::max('prod_barcode') + $productCode = rand(1234567890,50);
        if ($request->hasFile('img')) {
        if($image = $request->file('img')){
            $destinationPath = 'imageproduct';
            $imageName = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$imageName);
            $product['img'] = "$imageName";
        }
        }
        $product->save();
        return redirect('product')->with('success','Product Created Successfully.');
    }

    public function edit($id)
    {
        $categories = CategoryModel::all();
        $product = ProductModel::find($id);
        return view('backend.product.edit', compact(['product','categories']));
    }

    public function update(Request $request, ProductModel $product)
    {
        $request->validate([
            'prod_name'=>'required',
            'prod_description'=>'required',
            'prod_qty'=>'required',
            'prod_price'=>'required',
            'cat_id'=>'required',
            'img'=>'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $input = $request->all();
        if($image = $request->file('img')){
            if(File::exists($destinationPaths = 'imageslideshow/'.$product->img)){
                File::delete($destinationPaths);
            }
            $destinationPath = 'imageproduct';
            $imageName = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$imageName);
            $input['img'] = "$imageName";
        }else{
            unset($input['img']);
        }
        $product->update($input);
        return redirect('product')->with('success','Product Update Successfully.');
    }

    public function custom($id, $command)
    {
        $current_id = $id;
        if ($command == 'prod_status') {
            $product = ProductModel::select('id', 'prod_status')->where('id', '=', $id)->first();
            if ($product != null) {
                $product->prod_status =  $product->prod_status == 1 ? 0 : 1;
                $product->save();
            }
        }

        return redirect('product');
    }

    public function destroy($id)
    {
        $product = ProductModel::find($id);
        $image_path = 'imageproduct/'.$product->img;
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $product->delete();
        return redirect('product')->with('success','Product Delete Successfully.');
    }
}
