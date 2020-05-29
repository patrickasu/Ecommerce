<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Mail;
use App\Order;
use App\Mail\OrderPaid;

class PayPalController extends Controller
{
    public function getExpressCheckout($orderId) {
        $checkoutData = $this->checkoutData($orderId);
        $provider = new ExpressCheckout();
        $response = $provider->setExpressCheckout($checkoutData);
        //dd($response);
        return redirect($response['paypal_link']);
    }

    private function checkoutData($orderId) {
        $cart = \Cart::session(auth()->id());
        //dd($cart->getContent()->toarray());

        // $cartItems = [
        //     [
        //         'name' => 'Product 1',
        //         'price' => 9.99,
        //         'quantity' => 1,
        //     ],
        //     [
        //         'name' => 'Product 2',
        //         'price' => 4.99,
        //         'quantity' => 2,
        //     ],
        // ];
        $cartItems = array_map(function ($item) use($cart) {
            return [
                'name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['quantity']

            ];
        }, $cart->getContent()->toarray());
        //dd($cartItems);

        $checkoutData = [
            'items' => $cartItems,
            'return_url'=> route('paypal.success', $orderId),
            'cancel_url'=> route('paypal.cancel'),
            'invoice_id'=> uniqid(),
            'invoice_description'=> " Order Description",
            'total'=> $cart->getTotal(),
        ];
        return $checkoutData;
    }

    public function getExpressCheckoutSuccess(Request $request, $orderId){
        $token = $request->get('token');
        $payerId = $request->get('PayerID');
        $provider = new ExpressCheckout();
        $checkoutData = $this->checkoutData($orderId);
        $response = $provider->getExpressCheckoutDetails($token);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            // Perform transaction on PayPal
            $payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $payerId);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

            if (in_array($status, ['Completed','Processed'])) {
                $order = Order::find($orderId);
                $order->is_paid = 1;
                $order->save();
                //Send Mail
                Mail::to($order->user->email)->send(new OrderPaid($order));
                //return redirect()->route('home')->withMessage('Payment successful!');
            }
        }
        //empty cart
        \Cart::session(auth()->id())->clear();
        //send email to customer
        //take user to thank you page
        return redirect()->route('home')->withMessage('Your Order has been placed successfully');
        return redirect('/')->withError('Payment Unsuccessful  Something went wrong!');
        //dd('payment Successful');
    }
    public function CancelPage(){
        dd('payment failed');
    }
}
