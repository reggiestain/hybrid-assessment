<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Transaction;

class TransactionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Transaction index page
     * @return mixed
     */
    public function index() {

        $trans = Transaction::with(['user','product'])->where('user_id',Auth::user()->id)->get();

        return view('Auth.transactions', ['trans' => $trans]);
    }

}
