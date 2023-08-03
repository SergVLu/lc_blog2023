<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class DestroyController extends Controller
{
    public function __invoke($id)
    {

        // dd($id);
        $category =Category::find($id);
        $category->delete();
        // dd($data);
        return redirect()->route('admin.category.index');
    }
}
