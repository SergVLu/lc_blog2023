<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        // dd('edit');
        // $user = User::find($id);
        return view('admin.users.edit', compact('user') );
        
    }
}
