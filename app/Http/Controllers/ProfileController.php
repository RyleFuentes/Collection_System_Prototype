<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loggedUserID = session('loggedUser');
        $current = User::where('user_id', $loggedUserID)->first();
        return view('profile.user_profile', compact('current'));
    }

    public function check(Request $request){
        $loggedUserID = session('loggedUser');
        $current = User::where('user_id', $loggedUserID)->first();

        if(Hash::check($current->Password, $request->current_pass)){
            return back()->with('success', 'Password matches');
        }
        else{
            return back()->with('fail', 'Wrong Password');
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
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
