<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Helper\Cart;
use Illuminate\Http\Request;


class BookingControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $totalPrice, Cart $cart)
    {
        // $user = User::findOrFail($booking_user_id);
        // $tour = Tour::findOrFail($booking_tour_id);
        // $booking->booking_customer_name = $user->name;
        // $booking->booking_customer_email = $user->email;
        // $booking->booking_customer_quantity = $request->input('booking_quantity');
        // $booking->booking_customer_phone = $request->input('booking_customer_phone');
        // $booking->booking_amount = $amount;
        // $booking->booking_tour_id = $booking_tour_id;
        // $booking->booking_user_id = $booking_user_id;

        // session_start();


        $checkoutController = new CheckoutControlle();
        $checkoutController->vnpay_payment($cart->getTotalPrice());

        // Redirect back or to a success page
        // return redirect('/user/tour/1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::findOrFail($id);;
        // return view('user.checkout', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
