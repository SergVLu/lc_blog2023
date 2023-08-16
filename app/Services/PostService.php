<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function store($data){
        try {
            DB::beginTransaction();

            if(isset($data['tag_ids'])){
                $tag_ids=$data['tag_ids'];
                unset($data['tag_ids']);
                $data['preview_image'] = Storage::disk('public')->put('/images',$data['preview_image']);
                $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
                $post = Post::firstOrCreate($data);
                $post->tags()->attach($tag_ids);
            } else{
                $data['preview_image'] = Storage::disk('public')->put('/images',$data['preview_image']);
                $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
                Post::firstOrCreate($data);
            }
            DB::commit();

        } catch(Exception $exc){
            DB::rollBack();

            abort(404);
        }
    }

    public function update($data, $post){
        try {
            DB::beginTransaction();
            if(isset($data['tag_ids'])){
                $tagIds=$data['tag_ids'];
                unset($data['tag_ids']);
            } else{
                $tagIds= [];      
            }
            $post->tags()->sync($tagIds);
            
            if(isset($data['preview_image'])){
                Storage::disk('public')->delete('/images', $post->preview_image);
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            // if(array_key_exists('preview_image', $data)){
            //     Storage::disk('public')->delete('/images', $post->preview_image);
            //     $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            // }

            if(array_key_exists('main_image', $data)){
                Storage::disk('public')->delete('/images', $post->main_image);
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            
            $post->update($data);
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            abort(500);
        }
            
        return $post;
    }
            
    
}