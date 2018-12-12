<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AccountBalance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccountBalanceController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Account Balance edit|update
     * @return mixed
     */
    public function edit(Request $request) {
        $balance = AccountBalance::where('user_id', Auth::user()->id)->first();
        if ($request->isMethod('post')) {
                $AccountBalance = AccountBalance::where('user_id', Auth::user()->id)->first();
                if(!empty($balance)){
                    $AccountBalance->balance = $request->input('balance');
                    $AccountBalance->save();
                }else{
                $AccountBalance = new AccountBalance();    
                    $AccountBalance->balance = $request->input('balance');
                    $AccountBalance->user_id = Auth::user()->id;
                    $AccountBalance->save();
                }
            return redirect('/guest/balance')->with([compact('balance'), 'success'=> 'Account balance has been updated.']);
        }
        return view('Auth.account_balance', compact('balance'));
    }

}
