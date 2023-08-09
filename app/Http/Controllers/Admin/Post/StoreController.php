<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        // try{
        //     $data = $request->validated();
        //     $tag_ids=$data['tag_ids'];
        //     // dd($data);
        //     unset($data['tag_ids']);
        //     $data['preview_image'] = Storage::put('/images',$data['preview_image']);
        //     $data['main_image'] = Storage::put('/images',$data['main_image']);
        //     $post = Post::firstOrCreate($data);
        //     $post->tags()->attach($tag_ids);
        // } catch(Exception $exc){
        //     abort(404);
        // }
        // if(isset($data['tag_ids'])){
        // } else{
        //     $data['preview_image'] = Storage::put('/images',$data['preview_image']);
        //     $data['main_image'] = Storage::put('/images',$data['main_image']);
        //     Post::firstOrCreate($data);
        // }
        try {
            $data = $request->validated();

            if(isset($data['tag_ids'])){
                $tag_ids=$data['tag_ids'];
                unset($data['tag_ids']);
                $data['preview_image'] = Storage::put('/images',$data['preview_image']);
                $data['main_image'] = Storage::put('/images',$data['main_image']);
                $post = Post::firstOrCreate($data);
                $post->tags()->attach($tag_ids);
            } else{
                $data['preview_image'] = Storage::put('/images',$data['preview_image']);
                $data['main_image'] = Storage::put('/images',$data['main_image']);
                Post::firstOrCreate($data);
            }
        } catch(Exception $exc){
            abort(404);
        }
        
        return redirect()->route('admin.post.index');
    }
}
