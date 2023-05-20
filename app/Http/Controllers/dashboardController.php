<?php

namespace App\Http\Controllers;

use App\Models\collectionModel;
use App\Models\Transaction;
use PDF;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class dashboardController extends Controller
{
    public function index(){
        //'user' here is interchangeable you can change this to any name you want
        // loggedUser came from the session in the login controller

        $loggedUserID = session('loggedUser');

        $user = User::where('user_id', $loggedUserID)->with('collections')->first();
        $fetch = $user->collections->sum('running_balance');

        $user_transaction = $user->transactions()->get();

        return view('dashboard', compact('user', 'fetch', 'user_transaction'));
    }


    //redirecting to the add transaction page
    public function transaction_view(string $id){
        $user = User::where('user_id', $id)->first();
        return view('add_transaction', compact('user'));
    }

    //storing transaction to the database
    public function add_transaction(Request $request, $id){
        $user = User::where('user_id', $id)->first();
        
        $validate = $request->validate([
            'amount' => 'required',
            'date' => 'required',
        ]);

        $addTransaction = $user->transactions()->create([
            'Amount' => $validate['amount'],
            'transaction_date' => $validate['date'],
        ]);
        if($addTransaction){

            return redirect('dashboard')->with('message', "Succesfully added new payment request!");
        }
        else{
            return redirect('dashboard')->with('err_msg', "Something went wrong try again!");

        }

    }


    //CALLING THE TRANSACTION HISTORY
    public function transaction_history($id){
        $user = User::where('user_id', $id)->with('transactions')->first();
        $transactions = $user->transactions()->get();
        return view('related_page.transaction_history', compact('transactions'));
    }


    //GENERATING PDF CONTENTS

    public function pdf($id){
        $transaction = Transaction::where('transaction_id', $id)->first();
        $user = User::where('user_id', $transaction->userID)->first();

        $pdf = PDF::loadview('related_page.pdf-content', compact('transaction', 'user'));

        return $pdf->stream();
        //return dd($user->FirstName);
    }


    public function add_view(){
        return view('add');
    }

    public function debtInsert(Request $request){

        $userID = session('loggedUser');
        collectionModel::create([
            'running_balance' => $request->amount,
            'userID' => $userID,
        ]);

        return redirect('dashboard');
    }
    //USER PROFILE FUNCTION----------

  




    public function logout(){
        session()->flush();

        return redirect('login');
    }
}
