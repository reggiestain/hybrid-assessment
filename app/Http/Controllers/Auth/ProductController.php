<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\AccountBalance;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {

    /**
     * Products index page
     * @return mixed
     */
    public function index() {

        $products = Product::with('product_category')->get();

        return view('Auth.products', ['products' => $products]);
    }

    /**
     * Product view
     * 
     * @param type $id
     * @return json
     */
    public function view($id) {

        $product = Product::with('product_category')->where('id', $id)->first();
        $view = view("guest.product", compact('product'))->render();

        return response()->json(['html' => $view]);
    }

    /**
     * Buy product
     * 
     * @param type $id
     * @return json
     */
    public function buy($id) {
        $status = false;
        $product = Product::with('product_category')->where('id', $id)->first();
        $balance = AccountBalance::where('user_id', Auth::user()->id)->first();

        if (empty($balance)) {
            $status = false;
        } else {
            $price = abs($product->price);
            $discount = abs($product->discount);
            $newPrice = $this->discount($price, $discount);
            $remainder = $balance->balance - $newPrice;
            if ($remainder < 0) {
                $status = false;
            } else {
                Transaction::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id
                ]);

                $this->balanceUpate($remainder);

                $status = true;
            }
        }

        return response()->json($status);
    }

    Protected function balanceUpate($remainder) {
        $AccountBalance = AccountBalance::where('user_id', Auth::user()->id)->first();
        $AccountBalance->balance = $remainder;
        $AccountBalance->save();
    }

    /**
     * Product Discount view
     * @return json
     */
    public function edit($id) {
        $product = Product::where('id', $id)->first();
        $view = view("admin.discount", compact('product'))->render();

        return response()->json(['html' => $view]);
    }

    /**
     * Update Product
     * 
     * @param Request $request
     * @return json
     */
    public function update(Request $request) {

        $validation = Validator::make($request->all(), array(
                'price' => 'required|numeric',
                'discount' => 'required|numeric',
                )
        ); //close validation
        //If validation fail send back the Input with errors
        if ($validation->fails()) {
            //withInput keep the users info
            return Redirect('/dashboard')->withInput()->withErrors($validation->messages());
        } else {
            Product::where('id', $request->input('id'))->update(array(
                'price' => $request->input('price'),
                'discount' => $request->input('discount')
            ));

            return Redirect('/dashboard')->with('success', 'You have successfully updated');
        }
    }

    /**
     * Discount price
     * 
     * @param type $price
     * @param type $discount
     * @return int
     */
    public static function discount($price, $discount) {

        $price = abs($price);
        $discount = abs($discount);
        $sellingPrice = $price - ($price * ($discount / 100));

        return number_format($sellingPrice, 2);
    }

}
