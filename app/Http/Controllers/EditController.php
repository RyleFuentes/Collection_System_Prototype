<?php

namespace App\Http\Controllers;
use App\Models\collectionModel;
use App\Models\User;
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
        $users = User::all();
        $data = [];

        foreach ($users as $user) {
            $collections = $user->collections;

            $runningBalance = 0;
            foreach ($collections as $collection) {
                $runningBalance += $collection->running_balance;
            }

            $data[] = [
                'name' => $user->FirstName,
                'running_balance' => $runningBalance,
                'userid' => $user->user_id,
            ];
        }
        return view('editor', compact('data'));

    }


    ///////////////////LAST PROGRESS WAS THIS, FIX THIS TOMMOROW///////////////

    public function update_balance($id){
        $user = User::findOrFail($id);
        
        $collections = $user->collections;

        $runningBalance = 0;

        if ($collections->isEmpty()) {
           $runningBalance = 0;
        } else {
            foreach ($collections as $collection) {
                $runningBalance += $collection->running_balance;
            }
        }
    
        return view('modal.edit_balance', [
            
            'user' => $user,
            'collections' => $collections,
            'runningBalance' => $runningBalance
        ]);
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
        

        if ($collection) {
            $collection->update([
                'running_balance' => $request->input('running_balance')
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
