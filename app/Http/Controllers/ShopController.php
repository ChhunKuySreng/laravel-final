<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = ProductModel::orderBy('id', 'desc')->paginate(3);
        return view('frontend.shop.index', compact('products'));
    }
    public function productview($id)
    {
        if(ProductModel::where('id',$id)->exists()){
            $products = ProductModel::where('id',$id)->first();
            return view('frontend.shop.view', compact('products'));
        }else{
            return redirect('/')->with('status',"No Product");
        }
    }
}
