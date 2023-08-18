<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        // dd('create');
        $roles = User::getRoles();
        // dd($roles);
        return view('admin.users.create', compact('roles'));
        
    }
}
