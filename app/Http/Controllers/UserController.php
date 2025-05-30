<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('user.registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('login')->with('message', 'You have successfully registered your account!')->with('model', $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, UpdateUserRequest $updateUserRequest)
    {
        $updateUser = $user->update($updateUserRequest->only('first_name', 'middle_name', 'last_name', 'email', 'password'));

        return redirect()->back()->with('message', 'You have successfully update your profile')->with('model', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, DeleteUserRequest $request)
    {
        $user->delete();

        return redirect()->back()->with('message', 'User was delete successfully!');
    }

    // Custom resource
    public function dashboard()
    {
        $userName = Auth::user()->first_name;

        return view('dashboard')->with('userName', $userName);
    }

    public function management()
    {
        return view('user.management');
    }
}

