<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $date= Carbon::parse($post->created_at);
        // dd($date->translatedFormat('M'));
        $relposts = Post::where('category_id', $post->category_id)
                            ->where('id','!=', $post->id)
                            ->get()
                            ->take(3);

// dd($countComments);
        return view('post.show', compact('post','date','relposts'));
        
    }
}
