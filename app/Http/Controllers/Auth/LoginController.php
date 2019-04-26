<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use App\Models\SocialIdentity;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller {

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function __construct() {
        if (!Auth::check()){
            return redirect('/');
        }
    }
    
    public function login(Request $request) {
                
        $validator = Validator::make($request->all(),[
            'g-recaptcha-response' => 'required|captcha'
        ]);
        
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //Authentication passed...
            if (Auth::user()->user_group_id == 2) {
                if (Cart::count() > 0) {
                return redirect('/cart');
            }
                return redirect('/');
            }
            return redirect('dashboard');
        }
        return redirect('login')->with('error', 'Invalid username or password.');
    }

    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider) {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/login');
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);
        if (Auth::user()->user_group_id == 2) {
            if (Cart::count() > 0) {
                return redirect('/cart');
            }
            return redirect('/');
        }
        return redirect('dashboard');
    }

    public function findOrCreateUser($providerUser, $provider) {
        $account = SocialIdentity::whereProviderName($provider)
            ->whereProviderId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                        'email' => $providerUser->getEmail(),
                        'firstname' => $providerUser->getName(),
                ]);
            }

            $user->identities()->create([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider,
            ]);

            return $user;
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

}
