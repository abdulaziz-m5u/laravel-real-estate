<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
   
    public function index(): View
    {
        $messages = Message::all();

        return view('admin.messages.index', compact('messages'));
    }


    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
