<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

class PagesController extends Controller {

    /**
     * Home view
     *  
     * @return mixed
     */
    public function home() {
       
        $products  = Product::all();
        $categories =  ProductCategory::all();
        return view('pages.home', ['products'=>$products,'categories'=>$categories]);
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

}
