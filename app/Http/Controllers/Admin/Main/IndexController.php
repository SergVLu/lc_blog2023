<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $postItems = Post::all()->count();
        $tagItems = Tag::pluck('id')->count();
        $categoryItems = Category::pluck('id')->count();
        $users = User::pluck('id')->count();


        return view('admin.main.index', compact('tagItems','categoryItems','postItems','users'));
        
    }
}
