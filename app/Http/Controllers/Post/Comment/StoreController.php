<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(Post $post, StoreRequest $request)
    {
        // $comments = auth()->user()->comments;
        // dd($comment);
        $data = $request->validated();
        $data['post_id'] = $post->id;
        $data['user_id'] = Auth::user()->id;
        Comment::create($data);
        // dd($messages);
        return redirect()->route('post.show',$post->id);
        
    }
}
