<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create',compact('categories','tags'));
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
            'title'=> 'required',
            'image'=> 'required|mimes:jpeg,jpg,png',
            'image2'=> 'mimes:jpeg,jpg,png',
            'image3'=> 'mimes:jpeg,jpg,png',
            'categories'=> 'required',
            'tags'=> 'required',
            'body'=> 'required',
        ]);

        $image = $request->file('image');
        $image2 = $request->file('image2');
        $image3 = $request->file('image3');
        $imgname2 = "";
        $imgname3 = "";
        $slug = Str::slug($request->title);
        if(isset($image)){
            $carbon = Carbon::now()->toDateString();
            $imgname = $slug."-".$carbon."-".uniqid().".".$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('post')){
                Storage::disk('public')->makeDirectory('post');
            }
            $postImg = Image::make($image)->resize(1170,700)->save($imgname,90);
            Storage::disk('public')->put('post/'.$imgname,$postImg);

            if(!Storage::disk('public')->exists('post/postLavel')){
                Storage::disk('public')->makeDirectory('post/postLavel');
            }
            $postImgLavel = Image::make($image)->resize(600,600)->save($imgname,90);

            Storage::disk('public')->put('post/postLavel/'.$imgname,$postImgLavel);

        }else{
            $imgname = "default.png";
        }

        if(isset($image2)){
            $carbon = Carbon::now()->toDateString();
            $imgname2 = $slug."-02".$carbon."-".uniqid().".".$image2->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('post')){
                Storage::disk('public')->makeDirectory('post');
            }
            $postImg = Image::make($image2)->resize(1170,700)->save($imgname,90);

            Storage::disk('public')->put('post/'.$imgname2,$postImg);

        }
        if(isset($image3)){
            $carbon = Carbon::now()->toDateString();
            $imgname3 = $slug."-03".$carbon."-".uniqid().".".$image3->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('post')){
                Storage::disk('public')->makeDirectory('post');
            }
            $postImg = Image::make($image3)->resize(1170,700)->save($imgname,90);
            Storage::disk('public')->put('post/'.$imgname3,$postImg);

        }

        $post = new Post();

        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imgname;
        $post->image2 = $imgname2;
        $post->image3 = $imgname3;
        $post->body = $request->body;
          

        $post->save();

        $post->categories()->attach($request->categories); //this categories() come from post model function
        $post->tags()->attach($request->tags); //this tags() come from post model function

        // $subscribers = Subscriber::all();
        // foreach($subscribers as $subscriber){
        //     Notification::route('mail',$subscriber->email)
        //         ->notify(new NewPostNotify($post));
        // }
        //Notification::send($subscriber, new NewPostNotify($post));
        Toastr::success('Post Add successfylly','success');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function active($id){
        $post = Post::find($id);
            $post->status = true;
            $post->save();
       
            Toastr::info('Post Actice','info');
            return redirect()->route('admin.post.index');
        
    }

    public function inactive($id){
        $post = Post::find($id);
            $post->status = false;
            $post->save();
       
            Toastr::info('Post inactive','info');
            return redirect()->route('admin.post.index');
        
    }
}
