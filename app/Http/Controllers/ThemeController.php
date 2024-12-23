<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(){
        $blogs=Blog::latest()->paginate(4);
        $sliderBlogs=Blog::latest()->take(4)->get();
        return view('theme.index',compact('blogs','sliderBlogs'));
    }

    // public function category(){
    //     return view('theme.category');
    // }
    public function category($id){
        $categoryName=Category::find($id)->name;
        $blogs=Blog::where('category_id','=',$id)->paginate(4);
        return view('theme.category',compact('blogs','categoryName'));
    }
    // public function category($name){
    //     $category_id=Category::where('name',$name)->first()->id;
    //     $categoryName=Category::find($category_id)->name;
    //     $blogs=Blog::where('category_id','=',$category_id)->paginate(4);
    //     return view('theme.category',compact('blogs','categoryName'));
    // }

    public function contact(){
        return view('theme.contact');
    }

    // public function singleBlog(){
    //     return view('theme.single-blog');
    // }

    // public function login(){
    //     return view('theme.login');
    // }

    // public function register(){
    //     return view('theme.register');
    // }
}
