<?php

namespace App\Http\Controllers;

use App\Models\welcomeModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class welcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
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
    public function show(welcomeModel $welcomeModel): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(welcomeModel $welcomeModel): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, welcomeModel $welcomeModel): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(welcomeModel $welcomeModel): RedirectResponse
    {
        //
    }
}
