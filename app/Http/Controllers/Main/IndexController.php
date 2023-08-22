<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        if(isset(Auth::user()->role)){
            $role = Auth::user()->role;
            return view('main.index',compact('role'));
        }
        return view('main.index');
        
    }
}
