<?php

namespace App\Actions;

use App\Agent;
use App\Models\User;

class CreateUserAction
{
    public function execute($request)
    {
        $agent = null;
        $oldAgent = User::withTrashed()->firstOrNew(['email' => $request['email']]);
        $agent = User::withTrashed()->find($oldAgent->id) ?? new User();
        $password = $request['password'];
        $agent->password = $password;
        $agent->first_name = $request['firstName'];
        $agent->email = $request['email'];
        $agent->extra_info = $request['extraInfo'];
        request()->merge(['setPassword' => true]);
        $agent->save();
        return $agent->refresh();
    }
}
