<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->only(['index','destroy','userToAdmin']);
        $this->middleware('user')->only(['updateProfile','updatePassword','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role','user')->get();

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        abort_if($user->id !== auth()->id(),403);

        $user = User::findOrFail($user->id);

        return view('users.profile',compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, User $user)
    {
        $attributes = request()->validate([
            "name" => ["required","min:1"],
            "email" => ["required","unique:users,email"],
            "birthday" => ["required"]
        ]);
        $user->update($attributes);

        return back();
    }

    public function updatePassword(Request $request, User $user)
    {
        $attributes = request()->validate([
            'password' =>'required|confirmed|min:8'
        ]);

        $user->update($attributes);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }

    public function userToAdmin(User $user)
    {
        $user->update(['role' => 'admin']);

        return view('/home');
    }
}
