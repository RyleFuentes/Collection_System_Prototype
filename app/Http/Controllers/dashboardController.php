<?php

namespace App\Http\Controllers;

use App\Models\collectionModel;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class dashboardController extends Controller
{
    public function index(){
        //'user' here is interchangeable you can change this to any name you want
        // loggedUser came from the session in the login controller
        $loggedUserID = session('loggedUser');
        $user = User::where('user_id', $loggedUserID)->first();

         $fetch = collectionModel::where('userID', $loggedUserID)->sum('running_balance');



        return view('dashboard', compact('user', 'fetch'));
    }


    public function add_view(){
        return view('add');
    }

    public function debtInsert(Request $request){

        $userID = session('loggedUser');
        $debt = new collectionModel();

        $debt->running_balance = $request->amount;
        $debt->userID = $userID;
        $debt->save();

        return redirect('dashboard');
    }

    public function logout(){
        session()->flush();

        return redirect('login');
    }
}
