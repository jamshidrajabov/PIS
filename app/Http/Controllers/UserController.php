<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($user_id)
    {   
        $user=auth()->user();
        $colleagues = User::where('hospital_id', $user->hospital_id)
                          ->where('id', '<>', $user->id)->paginate(10);  
        return view('user.colleagues.index',['colleagues'=>$colleagues]);
    }
}
