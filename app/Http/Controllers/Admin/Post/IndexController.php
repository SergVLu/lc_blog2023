<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Admin\Post\BaseController;


class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();
        $categories = Category::all();

        return view('admin.posts.index', compact('posts','categories'));
    }
}
