<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        // dd($request['user']);
        $data = $request->validated();
        // dd($data);
        User::firstOrCreate($data);
        return redirect()->route('admin.user.index');
    }
}
