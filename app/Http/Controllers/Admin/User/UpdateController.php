<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        // $user = User::find($data['id']);
        $user->update($data);
    //    $user->fresh();
    //    dd($user);
        return view('admin.users.show', compact('user'));

    }
}
