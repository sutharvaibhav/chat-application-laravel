<?php

namespace App\Http\Controllers;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(){
        $chats = Chat::orderBy('created_at', 'asc')->get();
        return view('index',compact('chats'));
    }
    public function saveChat(Request $request){
        $validated = $request->validate([
            'message_box' => 'required|string|max:255',
        ]);

        $sender = $request->input('sender');
        $message = $validated['message_box'];

        if ($sender === 'user1') {
            Chat::create([
                'sender' => 'user1',
                'receiver' => 'user2',
                'message' => $message
            ]);
        } 
        elseif ($sender === 'user2') {
            Chat::create([
                'sender' => 'user2',
                'receiver' => 'user1',
                'message' => $message
            ]);
        } 
        else {
            return response()->json(['error' => 'Unknown sender'], 400);
        }
        return redirect()->route('index.home');
    }
}
