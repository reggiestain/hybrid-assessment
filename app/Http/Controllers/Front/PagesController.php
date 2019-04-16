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
     * Home view
     *  
     * @return mixed
     */
    public function options($id) {
        $products = Product::take(4)->get();
        $product  = Product::with('product_category')->find($id);
        //$categories =  ProductCategory::all();
        return view('pages.options', ['product'=>$product,'side'=>$products]);
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
