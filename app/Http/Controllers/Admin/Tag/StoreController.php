<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        // dd($request['category']);
        $data = $request->validated();
        // dd($data);
        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag.index');
    }
}
