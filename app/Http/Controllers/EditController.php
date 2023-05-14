<?php

namespace App\Http\Controllers;
use App\Models\collectionModel;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $searched = Session('searched');
        $data = User::query();

        $data = User::with('collections')
        ->get()
        ->unique('user_id') // remove duplicate users based on user_id
        ->map(function ($user) {
            $runningBalance = $user->collections->sum('running_balance');
            return [
                'name' => $user->FirstName,
                'running_balance' => $runningBalance,
                'userid' => $user->user_id,
                'role' => $user->role,
            ];
        });

        if($searched){
            $data = $data->where('FirstName', 'like', '%' . $searched . '%')
                ->orWhere('LastName', 'like', '%' . $searched . '%')
                ->orWhere('Email', 'like', '%' . $searched . '%');
        };

        $data = $data->get();

        return view('editor', compact('data'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->search;
        return redirect()->route('editor.index')->with('searched', $searchTerm);

    }
    ///////////////////LAST PROGRESS WAS THIS, FIX THIS TOMMOROW///////////////

   

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $collection = $user->collections()->first();

        $validated = $request->validate([
            'running_balance' => 'required'
        ]);
        

        if ($collection) {
            $collection->update([
                'running_balance' => $validated['running_balance'],
            ]);
        
            return redirect('editor')->with('message', 'Update successful');
        } else {
            return back()->with('err_msg', 'Collection not found');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
