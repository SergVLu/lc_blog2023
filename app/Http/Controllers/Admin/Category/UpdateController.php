<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        // $category = Category::find($data['id']);
        $category->update($data);
    //    $category->fresh();
    //    dd($category);
        return view('admin.categories.show', compact('category'));

    }
}
