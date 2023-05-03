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
        $filteredMembers = $this->getData();

        $members = User::all();
        if ($filteredMembers) {
            return view('editor', compact('filteredMembers'));
        }
        
        return view('editor', compact('members'));
    }

    public function getData(){
        $members =  DB::table('user')->select('*')->join('collection','user.user_id','=','collection.userID')->get();
        return $members;
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
