<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;
use App\Events\MessageEvent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {  return view('chat');
    }

    public function getMessage()
    {
        return Message::all();
    }

    public function sendMessage(Request $request)
    {
    
        $data=$request->all();
        
           $message=Message::create($data);
           event(new MessageEvent($message));
           return ['status' => 'Message Sent!'];
    }
}
