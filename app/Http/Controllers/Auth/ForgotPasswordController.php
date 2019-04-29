<?php

namespace App\Http\Controllers\Auth;
 
use Illuminate\Http\Request;
use App\Models\User;
 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Validator;
use App\Notifications\UsernameReminderNotification;
 
class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
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