<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    public function index()
    {
        $agent = 'agent';
        $agents = User::with(['roles'])
        ->whereHas('roles', function ($query) use ($agent) {
            $query->where('title', $agent);
        })
        ->get();

        return view('frontend.agent', compact('agents'));
    }
}
