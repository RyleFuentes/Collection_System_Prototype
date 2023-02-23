<?php

namespace App\Http\Controllers;

use App\Models\loginModel;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
      $fetch = User::where('Email', $request->email_login)->first();

      if(!$fetch){
        return back()->with('fail', "We do not recognize your email");
      }else{
        if(Hash::check($request->password_login, $fetch->Password)){
            $request->session()->put('loggedUser', $fetch->user_id);
            return redirect('dashboard');

        }
        else{
            return back()->with('fail','Incorrect Password');
        }
      }
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
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $loginModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $loginModel): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $loginModel): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $loginModel): RedirectResponse
    {
        //
    }
}
