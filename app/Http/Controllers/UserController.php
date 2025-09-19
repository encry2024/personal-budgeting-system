<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use Illuminate\View\View;

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
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('login')
            ->with('message', 'You have successfully registered your account!')
            ->with('model', $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, UpdateUserRequest $updateUserRequest): RedirectResponse
    {
//        if ($this->modelExists(User::all(), 'email', $updateUserRequest->input('email')))
        $user->update($updateUserRequest->only('first_name', 'middle_name', 'last_name', 'email', 'password'));

        return redirect()->back()->with('message', 'You have successfully update your profile')->with('model', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, DeleteUserRequest $request): RedirectResponse
    {
        $user->delete();

        return redirect()->back()->with('message', 'User was delete successfully!');
    }

    // Custom resource
    public function dashboard(): View
    {
        $userName = Auth::user()->first_name;

        return view('dashboard')->with('userName', $userName);
    }

    // @ToDo: Change management to settings.
    // * Change currency
    // * Lock Expense
    public function settings(): View
    {
        return view('user.settings');
    }
}

