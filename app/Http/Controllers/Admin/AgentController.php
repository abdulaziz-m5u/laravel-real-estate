<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\UpdateUserRequest;

class AgentController extends Controller
{
    public function edit(User $user)
    {
        return view('admin.agents.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request,User $user)
    {
        if($request->profile){
            File::delete('storage/' . $user->profile);
        }
        $profile = $request->file('profile')->store('agents/profile', 'public');
        if(Hash::check($request->input('profile'), bcrypt($user->profile))){
            $user->update($request->except('profile') + ['profile'=> $profile ]);
        }else {
            $user->update($request->except('profile') + ['profile'=> $profile, 'password' => bcrypt($request->password) ]);
        }

        return redirect()->back()->with([
            'message' => 'success updated',
            'alert-type' => 'info'
        ]);
    }
}
