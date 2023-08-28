<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.profile');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image',
        ]);

        $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('avatars'), $avatarName);
        $user = Auth::user();
        $user->update(['avatar' => $avatarName]);

        return back()->with('success', 'Avatar updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = $id;
        $oneproduct = Product::find($id);
        return view('user.showUserproduct', compact('oneproduct'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('user.editprofile');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'Phone' => ['required', 'unique:users,Phone'],
            'password' => ['required'],
            'avatar' => ['required', 'image', 'max:2048'],
        ]);
        $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('avatars'), $avatarName);
        $user = Auth::user();
        // $user->name=$request->name;
        // $user->email=$request->email;
        // $user->password=$request->password;
        // $user->avatar= $avatarName;
        // $user->save();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'avatar' => $avatarName,
            'Phone' => $request->Phone
        ]);
        return back()->with('success', 'User information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
