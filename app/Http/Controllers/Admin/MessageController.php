<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->paginate(4);

        return view('admin.message.index', compact('messages'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
    }
}
