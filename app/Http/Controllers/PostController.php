<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Session;

class PostController extends Controller
{
    public function index(){
        $posts_head_3 = Post::where('status',true)->orderBy('view_count','DESC')->take(3)->get();
        $post_leatest_3 = Post::latest()->where('status',true)->take(3)->get();
        $post_all = Post::where('status',true)->paginate(15);
        $cat_slider = Category::all();
        $cat_6 = Category::take(6)->inRandomOrder()->get();
        $tags = Tag::all();
       return view('welcome',compact('posts_head_3','post_leatest_3','post_all','cat_slider','tags','cat_6'));
    }

    public function details($slug){
        $post = Post::where('slug',$slug)->first();
        $random_post_10 = Post::where('status',true)->take(10)->inRandomOrder()->get();
           $postKey = 'blog_'.$post->id;
           if(!Session::has($postKey)){
              $post->increment('view_count');
              Session::put($postKey, 1);
           }
           if( Post::all()->count() > 3){
              $randomPost = Post::where('status',true)->take(3)->inRandomOrder()->get();
         return view('post',compact('post','randomPost','random_post_10'));
           }else{
              $randomPost = Post::where('status',true)->take(Post::all()->count())->inRandomOrder()->get();
         return view('post',compact('post','randomPost','random_post_10'));
           }
         
     }

     public function post_by_category($slug){
        //return $slug;
         $posts = Category::where('slug',$slug)->first()->posts()->where('status',true)->paginate(15);
         $cat = Category::where('slug',$slug)->first();
         return view('posts',compact('posts','cat'));
     }

     public function post_by_tag($slug){
      $posts = Tag::where('slag',$slug)->first()->posts()->where('status',true)->paginate(15);
      $tag = Tag::where('slag',$slug)->first();
       return view('posts',compact('posts','tag'));
      }

      public function post_bangla(){
         $posts = Tag::where('slag','bangla')->first()->posts()->where('status',true)->paginate(15);
         $tag = Tag::where('slag','bangla')->first();
       return view('posts',compact('posts','tag'));
      }
  
}
