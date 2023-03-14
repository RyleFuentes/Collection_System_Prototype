<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $search = session('search');

        if ($search) {
            $users = User::where('FirstName', 'like', '%' . $search . '%')->orWhere('LastName', 'like', '%' . $search . '%')->orWhere('Email', 'like', '%' . $search . '%')->get();
        }

        return view('admin', compact('users'));

    }


    
    public function search(Request $request)
    {
        $search = $request->search_user;
        $users = User::where('FirstName', 'like', '%' . $search . '%')->orWhere('LastName', 'like', '%' . $search . '%')->orWhere('Email', 'like', '%' . $search . '%')->get();

        return redirect()->route('admin.index')->with('users', $users)->with('search', $search);

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
    public function update(Request $request, string $id)
    {
        

        $user = User::where('user_id', $id)->first();

        $user->role = $request->rolechange;
        $user->save();
        return redirect('admin')->with('delete_mssg', 'test succesful');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('user_id', $id)->first();
        $user->delete();
        return redirect('admin')->with('delete_mssg', 'successfully deleted user');
    }
}
