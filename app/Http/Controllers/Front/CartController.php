<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cartItems = Cart::instance('default')->content();
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
    public function add($id, $size) {
        $product = Product::find($id);
        if (empty($size)) {
            $size = 'M';
        }
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($id) {
                return $cartItem->id === $id;
            });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('options', $id)->with('success', 'Item is already in your cart.');
        }

        Cart::add($id, $product->name, 1, $product->price, ['image' => $product->mime_type, 'size' => $size]);

        return redirect('/cart');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SwitchTosaveForLater($id) {

        $product = Cart::get($id);
        Cart::remove($id);
        Cart::instance('saveForLater')->add($id, $product->name, 1, $product->price, ['image' => $product->options->image])->associate('App\Models\Product');

        return redirect('cart')->with('success', 'Item has been saved for later.');
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        Cart::update($id, [$request->qty, 'options' => ['image' => $request->image, 'size' => $request->size]]);

        return back()->with('success', 'Item quantity has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Cart::remove($id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout() {
        return view('cart.checkout');
    }

}
