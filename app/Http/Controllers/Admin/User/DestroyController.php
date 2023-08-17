<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class DestroyController extends Controller
{
    public function __invoke(User $user)
    {

        // dd($id);
        // $user =Category::find($id);
        $user->delete();
        // dd($data);
        return redirect()->route('admin.user.index');
    }
}
