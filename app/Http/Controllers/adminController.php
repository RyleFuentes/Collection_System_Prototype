<?php

namespace App\Http\Controllers;

use App\Models\collectionModel;
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
        $search = session('search');
        $users = User::query();
    
        if ($search) {
            $users->where('FirstName', 'like', '%' . $search . '%')
                  ->orWhere('LastName', 'like', '%' . $search . '%')
                  ->orWhere('Email', 'like', '%' . $search . '%');
        }
    
        $users = $users->paginate(5);
    
        return view('admin', compact('users'));
    }
    
    
    public function search(Request $request)
    {
        $search = $request->search_user;
    
        return redirect()->route('admin.index')->with('search', $search);
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
            'password' => 'required|min:3|max:5',
            'role' => 'required',
            'running_balance' =>'required',
        ]);
        //proper way of inserting using the create method
        // the left part is the name of your table from the database
        //the right part is the validated data you've inputted in
        
        $findEmail = User::where('Email', $validatedData['email'])->first();

        if($findEmail){
            return back()->with('err_message', "Email is already taken, please try again");
        }
        else{

            $insert = User::create([
                'FirstName' => $validatedData['fname'],
                'LastName' => $validatedData['lname'],
                'Email' => $validatedData['email'],
                'Password' => password_hash($validatedData['password'], PASSWORD_BCRYPT),
                'role' => $validatedData['role'],
                
            ]);
    
            $balance_insert = $insert->collections()->create([
                'running_balance' => $validatedData['running_balance'],
    
            ]);
        }

    
        if ($insert && $balance_insert) {
            return back()->with('message', "Successfully Added the user!");
        } else {
            return back()->with('err_message', "Try again, an error occurred");
        }
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
    public function edit($id)
    {
        $curr_role = User::where('user_id', $id)->first();
        
        return view('update_user', ['user'=>$curr_role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('user_id', $id);

        $validated_request = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'role' => 'required'

        ]);

        $user->update([
            'role' => $validated_request['role'],
            'FirstName' => $validated_request['fname'],
            'LastName' => $validated_request['lname'],
            'Email' => $validated_request['email'],

        ]);

        return redirect('admin')->with('message', 'Successfully Edited user information');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::where('user_id', $id)->first();
        //$balance = $user->collections()->first(); 
        if ($user) {
            $user->collections()->delete(); // delete the collections
            $user->delete(); // delete the user
            return redirect('admin')->with('delete_mssg', 'successfully deleted user');
        } else {
            return redirect('admin')->with('delete_mssg', 'user not found');
        }
    }
}
