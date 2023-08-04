<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        // $tag = Tag::find($data['id']);
        $tag->update($data);
    //    $tag->fresh();
    //    dd($tag);
        return view('admin.tags.show', compact('tag'));

    }
}
