<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Message;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function index(){

        abort_if(Gate::denies('user_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
