<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class pageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','Desc')->where('status','PUBLISHED')->paginate(4);
        return view('index',compact('posts'));
    }
    public function post($slug){
        $post = Post::where('slug',$slug)->first();
        return view('post',compact('post'));
    }
    public function category($slug){
        $category = Category::where('slug',$slug)->pluck('id')->first();
        $posts = Post::where('category_id',$category)
        ->orderBy('id','Desc')->where('status','PUBLISHED')->paginate(3);
        return view('index',compact('posts'));

    }
    public function slug($slug){
        $posts = Post::whereHas('tags',function($query) use($slug){
            $query -> where('slug',$slug);
        })->orderBy('id','DESC')->where('status','PUBLISHED')->paginate(4);
        return view('index',compact('posts'));
    }
}
