<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $user_id=Auth::user()->id;
        $posts=Post::OrderBy('id','desc')->where('user_id', $user_id)->paginate("12");
        $cats=Category::all();
        return view('home')->with(['cats'=>$cats,'posts'=>$posts]);
    }
    public function postUploadFile(Request $request){
        $category_id=$request['category_id'];
        $file_name=$request['file_name'];
        $post_file_name=date("y-m-d-h-i-s")."-".$request->file('post_file')->getClientOriginalName();
        $post_file=$request->file('post_file');

        $post=new Post();
        $post->file_name=$file_name;
        $post->post_file=$post_file_name;
        $post->category_id=$category_id;
        $post->user_id=Auth::user()->id;
        $post->save();
        
        Storage::disk('post')->put($post_file_name, File::get($post_file));
        return redirect()->back();
    }
    public function getFile($file_name){
        $file=Storage::disk('post')->get($file_name);
        return response($file, 200)->header("Content-Type", "*.*");
    }
}
