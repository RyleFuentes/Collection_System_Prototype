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
        $insert = new User();
        $request->validate([
            'fname' => 'required',
            'lname'  => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|max:5'
        ]);

        $insert->FirstName = $request->fname;
        $insert->LastName = $request->lname;
        $insert->Email = $request->email;
        $insert->Password = password_hash($request->password, PASSWORD_BCRYPT);
        $insert->save();

        if($insert){
            return redirect('login')->with('message', "Successfully registered you can now login");
        }else{
            return back()->with('message', "Try again, an error occured");
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
