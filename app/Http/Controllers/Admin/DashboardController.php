<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Property;

class DashboardController extends Controller
{
    public function index(){

        $agent = 'agent';
        $agents = User::with(['roles'])
        ->whereHas('roles', function ($query) use ($agent) {
            $query->where('title', $agent);
        })
        ->count();
        $properties = Property::count();
        $messages = Message::count();

        return view('admin.dashboard', compact('agents', 'properties', 'messages'));
    }
}
