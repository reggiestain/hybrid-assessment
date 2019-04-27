<?php

namespace App\Http\Controllers\Auth;
 
use Illuminate\Http\Request;
use App\Models\User;
 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\sendsPasswordResetEmails;
use Illuminate\Support\Facades\Validator;
use App\Notifications\UsernameReminderNotification;
 
class ForgotPasswordController extends Controller
{
    use sendsPasswordResetEmails;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }
     
    
 
}