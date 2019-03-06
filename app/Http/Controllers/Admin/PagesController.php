<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Botconfig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function getuser(){
        $user = Auth::user();        
        return $user;
    }
    
    protected function validator(array $data) {
        return Validator::make($data, [
                    'token' => 'required|string|unique:botconfig',
        ]);
    }
    
    public function Dashboard() {
        return view('Auth.dashboard');
    }
    
    protected function create(array $data) {
        $config = Botconfig::create([
                    'token' => $data['token'],
                    'user_id' => $this->user()->id,
                    'currency' => $data['currency'],
                    'webhook' => $data['webhook'],
        ]);
        
        return $config;
    }

    public function storeconfig(Request $request) {
        
        $validator = $this->validator($request->all());
        
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // create config
        $this->create($request->all());
        
        return Redirect::back()->with('success', 'Config was created successfully.');
       
    }
    
    public function updateconfig(Request $request) {
        
        $validator = $this->validator($request->all());
        
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // create config
        $user->name = request('token');
        $user->save();
        return Redirect::back()->with('success', 'Config was updated successfully.');
       
    }

}
