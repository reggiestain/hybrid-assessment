<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveForLaterController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cartItems = Cart::content();
        //dd($cartItems);

        return view('cart.items', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id) {
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $product = Product::find($id);
        //Cart::add($id, $product->name, 1,$product->price, ['size'=>'Medium']);

        return view('cart.index', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id) {
        $product = Cart::instance('saveForLater')->get($id);
        
        
        Cart::instance('saveForLater')->remove($id);
        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });
      
        if($duplicates->isNotEmpty()){
           return redirect()->route('options',$id)->with('success','Item is already in your cart.') ;
        }
        Cart::instance('default')->add($id, $product->name, 1, $product->price, ['image' => $product->options->image]);

        return back()->with('success','Item has been moved to cart.');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Switchto($id) {
        $product = Product::find($id);
                   Cart::instance('saveForLater')->remove($product->id);
       
        Cart::instance('default')->add($id, $product->name, 1, $product->price, 
                      ['image' => $product->mime_type])->associate('App\Models\Product');

        return redirect('cart')->with('success','Item is already in your cart.') ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        Cart::update($id, $request->qty);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Cart::instance('saveForLater')->remove($id);
        return back()->with('success','Saved for later item has been removed!');
    }

}
