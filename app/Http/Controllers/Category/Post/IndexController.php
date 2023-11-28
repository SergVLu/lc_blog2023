<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        // $posts = $category->posts;
        $posts = $category->posts()->paginate(4);
        // dd($category);

        return view('category.post.index' ,compact('posts','category'));
        
    }
}
