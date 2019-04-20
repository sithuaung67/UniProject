<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function getWelcome(){
        $cats=Category::all();
        return view ('welcome')->with(['cats'=>$cats]);
    }
    public function getPosts($cat_id){
        $posts=Post::where('category_id', $cat_id)->paginate('12');
        return view ('posts')->with(['posts'=>$posts]);
    }
    public function getFile($file_name){
        $file=Storage::disk('post')->get($file_name);
        return response($file, 200)->header("Content-Type", "*.*");
    }
}
