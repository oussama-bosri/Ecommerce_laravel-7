<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalPaymentContoller extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function handlePayment()
    {
        $data = [];
        $data['items'] = [];

        foreach(\Cart::getContent() as $item){
            array_push($data['items'],[
            'name' => $item->name,
            'price' => (int) ($item->price /175),
            'desc' => $item->associatedModel->description,
            'qty' => $item->quantity
            ]);
        }
        
        $data['invoice_id'] = auth()->user()->id;
        $data['invoice_description'] = "Commande #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('success.payment');
        $data['cancel_url'] = route('cancel.payment');
        
        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }
        
        $data['total'] = $total;
        $paypalModule = new ExpressCheckout;
        $res = $paypalModule->setExpressCheckout($data);
        $res = $paypalModule->setExpressCheckout($data,true);
        return redirect($res['paypal_link']);

        //give a discount of 10% of the order amount
        $data['shipping_discount'] = round((10 / 100) * $total, 2);

    }
     public function paymentCancel(){
         return redirect()->route('cart.index')->with([
             'info' => 'Vous avez annuler le paiement'
         ]);
     }

     public function paymentSuccess(Request $request){
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
        if(in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING'])) {
            foreach(\cart::getContent() as $item){

                Order::create([
                    "user_id" => auth()->user()->id,
                    "product_name" => $item->name,
                    "qty" => $item->quantity,
                    "price" =>$item->price,
                    "total" => $item->price * $item->quantity,
                    "paid" => 1,
                ]);
                \cart::clear();
            }
            return redirect()->route('cart.index')->with([
                'success' => 'paiement effectué avec succés'
            ]);
            }
     }

    }

