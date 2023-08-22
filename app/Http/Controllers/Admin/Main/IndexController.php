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
        $data =[];
        $data['postCount'] = Post::all()->count();
        $data['tagCount'] = Tag::pluck('id')->count();
        $data['categoryCount'] = Category::pluck('id')->count();
        $data['userCount'] = User::pluck('id')->count();


        return view('admin.main.index', compact('data'));
        
    }
}
