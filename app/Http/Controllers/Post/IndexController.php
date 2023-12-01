<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(6);                  //в первой оптимизации тут ничего делать не надо а во второй вместо этого:
        // $posts = Post::with('category')->paginate(6);   //вот это сразу с постом подгрузит и категорию//оптимизация категорий 2(вместо 1й)
        // dd($posts);
        $randomPosts = Post::get()->random(4);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(5);
        // dd($likedPosts);
        if(isset(Auth::user()->role)){
            $role = Auth::user()->role;
            return view('post.index',compact('posts','role','randomPosts','likedPosts'));
        }

        return view('post.index', compact('posts','randomPosts','likedPosts'));
        
    }
}
