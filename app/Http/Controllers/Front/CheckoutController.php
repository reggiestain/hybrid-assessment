<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Billow\Contracts\PaymentProcessor;
use App\Models\Product;
use App\Models\Order;
use App\Models\Address;

class CheckoutController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request, PaymentProcessor $payfast) {
        
        $strNum = $request->input('street_number');
        $strNam = $request->input('street_name');
        $province = $request->input('province');
        $postCode = $request->input('post_code');
        $ctry = $request->input('country');
        $items = implode(", ", $request->input('items'));
        //$address = "$strNum $strNam<br>$province<br>$postCode<br>$ctry";
        if (!Auth::check()) {
            if (empty($strNam)) {
                $address = $request->input('address');                
            }
            $address = "$strNum $strNam<br>$province<br>$postCode<br>$ctry";
            $userId = 0;
        } else {
            if (empty($strNam)) {
                $address = $request->input('address');                
            } else {
               $address = "$strNum $strNam<br>$province<br>$postCode<br>$ctry"; 
            }
            
           
            $userId = Auth::user()->id;
            $address =Address::create([
                'user_id' => $userId,
                'street_number' => $strNum,
                'street_name' => $strNam,
                'province' => $province,
                'post_code' => $postCode,
                'country' => $ctry
            ]);
            
        }

        $order = Order::create([
                'user_id' => $request->input('name'),
                'payment_id' =>$request->input('name') . ' ' . $request->input('surname'), // A unique reference for the order.
                'email' => $request->input('email'),
                'phone'=>$request->input('mobile'),
                'items' => $items,
                'name' => $request->input('name') . ' ' . $request->input('surname'),
                'qty' => Cart::instance('default')->count(),
                'address' => $address,
                'amount' => Cart::instance('default')->subtotal()
        ]);
        
        if($order->id){
        
        // Build up payment Paramaters.
        $payfast->setBuyer($request->input('name'), $request->input('surname'), $request->input('email'));
        $payfast->setAmount(str_replace( ',', '', Cart::instance('default')->subtotal()));
        $payfast->setItem($items, $items);
        $payfast->setMerchantReference($request->input('surname').' '.$order->id);
        // Return the payment form.
        return $payfast->paymentForm('Confirm and Pay');
        }else{
        return 'false';
        }
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
    public function add($id) {
        $product = Product::find($id);

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($id) {
                return $cartItem->id === $id;
            });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('options', $id)->with('success', 'Item is already in your cart.');
        }
        Cart::add($id, $product->name, 1, $product->price, ['image' => $product->mime_type]);

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
        Cart::update($id, $request->qty);
        return back()->with('success', 'Item has been deleted.');
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
