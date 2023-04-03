<?php

namespace App\Http\Controllers;
use App\Models\SlideshowModel;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){

    $slideshows = SlideshowModel::orderBy('order', 'desc')->get();
    return view('frontend.homepage.index',compact('slideshows'));

    }
}
