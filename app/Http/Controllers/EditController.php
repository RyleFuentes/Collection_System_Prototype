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
    //DISPLAYS THE PAGE


    public function index()
    {
        $searched = session('searched');
    
        if ($searched && $searched->isNotEmpty()) {
            $data = $searched->map(function ($user) {
                $runningBalance = $user->collections->sum('running_balance');
    
                return [
                    'name' => $user->FirstName,
                    'running_balance' => $runningBalance,
                    'userid' => $user->user_id,
                    'role' => $user->role,
                ];
            });
        } else {
            $data = User::with('collections')->get()
                ->map(function ($user) {
                    $runningBalance = $user->collections->sum('running_balance');
    
                    return [
                        'name' => $user->FirstName,
                        'running_balance' => $runningBalance,
                        'userid' => $user->user_id,
                        'role' => $user->role,
                    ];
                });
        }
    
        return view('editor', compact('data'));
    }
    
    public function search(Request $request)
    {

        $searchTerm = $request->search;
       
        $result = User::where('FirstName', 'like', '%' . $searchTerm . '%')
            ->orWhere('LastName', 'like', '%' . $searchTerm . '%')
            ->orWhere('Email', 'like', '%' . $searchTerm . '%')
            ->with('collections')
            ->get();

        return redirect()->route('editor.index')->with('searched', $result);
      
    }

    

    
   
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

    //REDIRECTS TO THE EDIT PAGE SO USER CAN EDIT BALANCE ---------------
    public function edit(string $id)
    {
        $user = User::where('user_id', $id)->with('collections')->first();
        
        // Calculate the running balance
        $user_balance = $user->collections->sum('running_balance');
        
        return view('modal.edit_balance', compact('user', 'user_balance'));
    }


   //UPDATE USER BALANCE -------------------------
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
        
            return redirect('editor')->with('message', 'Successfully updated user_balance');
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
