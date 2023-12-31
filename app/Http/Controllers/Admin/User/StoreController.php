<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Jobs\StoreUserJob;
// use Illuminate\Http\Request;
// use App\Mail\User\PasswordMail;
// use Illuminate\Auth\Events\Registered;
// use App\Models\User;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        // dd($request['user']);
        $data = $request->validated();
        // $data['password']=Hash::make($data['password']);
        // $password = Str::random(10);
        // $data['password']=Hash::make($password);
        // $user = User::firstOrCreate(['email' => $data['email']], $data);
        // Mail::to($data['email'])->send(new PasswordMail($password));
        // event(new Registered($user));

        StoreUserJob::dispatch($data);

        return redirect()->route('admin.user.index');
    }
}
