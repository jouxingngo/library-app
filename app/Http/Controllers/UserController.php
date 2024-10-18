<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::role('user')->with('profile')->get();
        return view("admin.user.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'phone' => ['required', 'max:20'],
            'age' => ['required'],
            'address' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('user');

        Profile::create([
            'phone' => $request->input("phone"),
            'age' => $request->input("age"),
            'address' => $request->input("address"),
            'user_id' => $user->id
        ]);

        return redirect()->route("user.index")->with('success', 'User Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('profile')->findOrFail($id);
        return view("admin.user.show", compact("user"));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('profile')->findOrFail($id);
        return view("admin.user.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'phone' => ['required', 'max:20'],
            'age' => ['required'],
            'address' => ['required']
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        $profile = Profile::where('user_id', $user->id)->first();
        $profile->phone = $request->input("phone");
        $profile->age = $request->input("age");
        $profile->address = $request->input("address");
        $profile->save();

        return redirect()->route("user.index")->with('success', 'User Updated');

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route("user.index")->with('success', 'User Deleted');
    }
}
