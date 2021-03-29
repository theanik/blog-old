<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::latest()->get();
        return view('admin.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if(isset($image)){
            $curTime = Carbon::now()->toDateString();
            $imgname = $slug.'-'.$curTime.'-'.uniqid().'.'.$image->getClientOriginalExtension();


            if(!Storage::disk('public')->exists('categoryImg/slider')){
                Storage::disk('public')->makeDirectory('categoryImg/slider');

            }
            $slideImage = Image::make($image)->resize(640,426)->save($imgname,90);
            //$slideImage = Image::make($image)->resize(500,333)->stream();
            Storage::disk('public')->put('categoryImg/slider/'.$imgname,$slideImage);

            //last here
        }else{
            $imgname = "default.png";
        }

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->image = $imgname;
        $category->save();
        Toastr::success('Category Add successfylly','success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
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
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);
        $catOld = Category::find($id);

        if(isset($image)){
            $curTime = Carbon::now()->toDateString();
            $imgname = $slug.'-'.$curTime.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            

            if(!Storage::disk('public')->exists('categoryImg/slider')){
                Storage::disk('public')->makeDirectory('categoryImg/slider');

            }
            if(Storage::disk('public')->exists('categoryImg/slider/'.$catOld->image)){
                Storage::disk('public')->delete('categoryImg/slider/'.$catOld->image);
            }
            $slideImage = Image::make($image)->resize(640,426)->save($imgname,90);
            Storage::disk('public')->put('categoryImg/slider/'.$imgname,$slideImage);

            //last here
            }else{
                $imgname = "default.png";
            }

            //$category = new Category();
            $catOld->name = $request->name;
            $catOld->slug = $slug;
            $catOld->image = $imgname;
            $catOld->save();
            Toastr::success('Category Add successfylly','success');
            return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::findOrFail($id);
       
        if(Storage::disk('public')->exists('categoryImg/slider/'.$cat->image)){
            Storage::disk('public')->delete('categoryImg/slider/'.$cat->image);
        }
        $cat->delete();
        Toastr::success('Category Delete successfylly','success');
        return redirect()->back();
    }
}
