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
            }else{
            $address = "$strNum $strNam<br>$province<br>$postCode<br>$ctry";
            $userId = 0;
            }
        } else {
            if (empty($strNam)) {
                $address = $request->input('address');                
            } else {
               $address = "$strNum $strNam<br>$province<br>$postCode<br>$ctry"; 
            }
                       
            $userId = Auth::user()->id;
            $address = Address::create([
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
        
         $order->payment_id = $order->id;
         $order->save();
        // Build up payment Paramaters.
        $payfast->setBuyer($request->input('name'), $request->input('surname'), $request->input('email'));
        $payfast->setAmount(str_replace( ',', '', Cart::instance('default')->subtotal()));
        $payfast->setItem($items, $items);
        $payfast->setMerchantReference($order->id);
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
    public function itn(Request $request, PaymentProcessor $payfast)
    {
         
        $order = Order::where('payment_id', $request->get('m_payment_id'))->firstOrFail(); // Eloquent Example
    
        // Verify the payment status.
        $status = $payfast->verify($request, $order->amount, $order->m_payment_id)->status();
    
        // Handle the result of the transaction.
        switch( $status )
        {
            case 'COMPLETE': // Things went as planned, update your order status and notify the customer/admins.
                $order->status = 'success';
                $order->save();
                break;
            case 'FAILED': // We've got problems, notify admin and contact Payfast Support.
                 echo "FAILED";
                break;
            case 'PENDING': // We've got problems, notify admin and contact Payfast Support.
                echo "PENDING";
                break;
            default: // We've got problems, notify admin to check logs.
                echo "default";
                break;
        }
    }       


}
