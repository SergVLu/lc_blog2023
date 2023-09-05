<?php
namespace App\Http\Controllers\Personal\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        // return '777main';
        $roles = User::getRoles();
        return view('personal.user.show', compact('user','roles'));
        // return view('personal.main.index');
        
    }
}
