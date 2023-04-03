<?php

namespace App\Http\Controllers;

use App\Models\SlideshowModel;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SlideshowController extends Controller
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
     * Show the application slideshow.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slideshows = SlideshowModel::orderBy('order', 'desc')->get();
        return view('backend.slideshow.index', compact('slideshows'));
    }

    public function create()
    {
        return view('backend.slideshow.create');
    }

    public function store(Request $request, SlideshowModel $slideshow)
    {
        $request->validate([
            'title_en'=>'required',
            'subtitle_en'=>'required',
            'text_en'=>'required',
            'title_kh'=>'required',
            'subtitle_kh'=>'required',
            'text_kh'=>'required',
            'link'=>'required',
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        // $input = $request->all();
        $slideshow = new SlideshowModel();
        $slideshow->title_en = $request->title_en;
        $slideshow->subtitle_en = $request->subtitle_en;
        $slideshow->text_en = $request->text_en;
        $slideshow->title_kh = $request->title_kh;
        $slideshow->subtitle_kh = $request->subtitle_kh;
        $slideshow->text_kh = $request->text_kh;
        $slideshow->link = $request->link;
        $slideshow->order = SlideshowModel::max('order') + 1;
        $slideshow->enabled = $request->enabled;
        if ($request->hasFile('img')) {
        if($image = $request->file('img')){
            $destinationPath = 'imageslideshow';
            $imageName = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$imageName);
            $slideshow['img'] = "$imageName";
        }
        }
        $slideshow->save();
        return redirect('slideshow')->with('success','Slideshow Created Successfully.');
    }

    public function edit($id)
    {
        $slideshow = SlideshowModel::find($id);
        return view('backend.slideshow.edit', compact('slideshow'));
    }

    public function update(Request $request, SlideshowModel $slideshow)
    {
        $request->validate([
            'title_en'=>'required',
            'subtitle_en'=>'required',
            'text_en'=>'required',
            'title_kh'=>'required',
            'subtitle_kh'=>'required',
            'text_kh'=>'required',
            'link'=>'required',
            'img'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if($image = $request->file('img')){
            if(File::exists($destinationPaths = 'imageslideshow/'.$slideshow->img)){
                File::delete($destinationPaths);
            }
            $destinationPath = 'imageslideshow';
            $imageName = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$imageName);
            $input['img'] = "$imageName";
        }else{
            unset($input['img']);
        }
        $slideshow->update($input);
        return redirect('slideshow')->with('success','Slideshow Update Successfully.');
    }

    public function custom($id, $command, $order)
    {
        $current_id = $id;
        $current_order = $order;

        if ($command == 'down') {
            $slideshow = SlideshowModel::select('id', 'order')->where('order', '<', $current_order)->orderBy('order', 'desc')->first();
            if ($slideshow != null) {
                $above_order = $slideshow->order;

                $slideshow->order = $current_order;
                $slideshow->save();

                $slideshow = SlideshowModel::select('id', 'order')->where('id', $current_id)->first();
                $slideshow->order = $above_order;
                $slideshow->save();
            }
        }
        if ($command == 'up') {
            $slideshow = SlideshowModel::select('id', 'order')->where('order', '>', $current_order)->orderBy('order')->first();
            if ($slideshow != null) {
                $below_order = $slideshow->order;

                $slideshow->order = $current_order;
                $slideshow->save();

                $slideshow = SlideshowModel::select('id', 'order')->where('id', $current_id)->first();
                $slideshow->order = $below_order;
                $slideshow->save();
            }
        }
        if ($command == 'enabled') {
            $slideshow = SlideshowModel::select('id', 'enabled')->where('id', '=', $id)->first();
            if ($slideshow != null) {
                $slideshow->enabled =  $slideshow->enabled == 1 ? 0 : 1;
                $slideshow->save();
            }
        }

        return redirect('slideshow');
    }
    public function destroy($id)
    {
        $slideshow = SlideshowModel::find($id);
        $image_path = 'imageslideshow/'.$slideshow->img;
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $slideshow->delete();
        return redirect('slideshow');
    }
}
