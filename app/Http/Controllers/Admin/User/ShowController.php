<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        // $user = User::find($id);
        // dd($user);
        return view('admin.users.show', compact('user'));
        
    }
}
