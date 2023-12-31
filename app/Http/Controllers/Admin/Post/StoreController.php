<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\Post\BaseController;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);
        
        return redirect()->route('admin.post.index');
    }
}
