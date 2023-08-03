<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        // dd($request['category']);
        $data = $request->validated();
        // dd($data);
        Category::firstOrCreate($data);
        return redirect()->route('admin.category.index');
    }
}
