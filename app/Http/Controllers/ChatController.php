<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $messages=Chat::all();
        return view('chat.chat',['messages'=>$messages]);
    }
    public function store(Request $request)
    {
        
        $user=auth()->user();
        $request->validate([
            'message' => 'required',
        ]);
        
        Chat::create(
            [
                'user_id'=>$user->id,
                'message'=>$request->message,
                'to'=>0
            ]
            );
        return redirect()->back();
    }
}
