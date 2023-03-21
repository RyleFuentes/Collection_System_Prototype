<?php

namespace App\Http\Controllers;

use App\Models\registerModel;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register_login.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname'  => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|max:5'
        ]);
        //proper way of inserting using the create method
        // the left part is the name of your table from the database
        //the right part is the validated data you've inputted in
        $insert = User::create([
            'FirstName' => $validatedData['fname'],
            'LastName' => $validatedData['lname'],
            'Email' => $validatedData['email'],
            'Password' => password_hash($validatedData['password'], PASSWORD_BCRYPT),
        ]);
    
        if ($insert) {
            return redirect('login')->with('message', "Successfully registered you can now login");
        } else {
            return back()->with('message', "Try again, an error occurred");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $registerModel): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $registerModel): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $registerModel): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $registerModel): RedirectResponse
    {
        //
    }
}
