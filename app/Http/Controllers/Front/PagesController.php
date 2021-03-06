<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller {

    public function __construct() {
        if (!Auth::check()) {
            return redirect('/');
        }
        
    }

    /**
     * Home view
     *  
     * @return mixed
     */
    public function home() {
        $products = Product::all();
        $categories = ProductCategory::all();
        return view('pages.home', ['products' => $products, 'categories' => $categories]);
    }
    
    /**
     * Contact view
     *  
     * @return mixed
     */
    public function contact() {
        return view('pages.contact');
    }
    /**
     * Home view
     *  
     * @return mixed
     */
    public function options($id) {
        $products = Product::inRandomOrder()->take(4)->get();
        $product = Product::with('product_category')->find($id);
        //$categories =  ProductCategory::all();
        return view('pages.options', ['product' => $product, 'side' => $products]);
    }

    /**
     * Login view
     *  
     * @return mixed
     */
    public function login() {
               
        return view('pages.login');
    }

    /**
     * Register view
     *  
     * @return mixed
     */
    public function register() {
        return view('pages.register');
    }

    public function back() {
        return back();
    }

    public function policy() {
        return view('pages.policy');
    }

}
