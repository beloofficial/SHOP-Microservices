<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;

class UserController extends Controller
{
    //
    public function get(User $user)
    {
    	return $user;
    }

    public function create(StoreUserRequest $request)
    {
    	$request = $request->validated();
    	$request['password'] = bcrypt($request['password']);
    	User::create($request);
    }

    public function update(User $user,UpdateUserRequest $request)
    {	
        if (auth()->user()->can('equal', $user)) {   

            $user->name = $request->name;
            $user->save();
        }
    }

    public function destroy(User $user)
    {
        if (auth()->user()->can('equal', $user)) { 

    	   $user->delete();
        }
    }
}

