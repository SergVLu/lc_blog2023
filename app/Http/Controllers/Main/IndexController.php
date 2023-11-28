<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        //здесь будет главная страница, а сейчас просто редирект на страницу постов

        // $posts = Post::paginate(6);
        // $randomPosts = Post::get()->random(4);
        // $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(5);
        // // dd($likedPosts);
        // if(isset(Auth::user()->role)){
        //     $role = Auth::user()->role;
        //     return view('main.index',compact('posts','role','randomPosts','likedPosts'));
        // }
        // return view('main.index', compact('posts','randomPosts','likedPosts'));
        return redirect()->route('post.index');
        
    }
}
