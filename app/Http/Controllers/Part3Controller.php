<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Customers;
use Illuminate\Support\Facades\DB;

class Part3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /** The below code is for the customer with the highest number of orders
         * $arr was declared in order to show the final result in a cleaner way.
         * The query was sorted by orderDate (asc) in order to display the first customer
         * with the highest order.
         *
         */
        $customers = Customers::with(['orders' => function ($query) {
            $query->orderBy('orderDate', 'asc');
        }])->withCount('orders')->get();


        $highest_orders = $customers->sortByDesc('orders_count');
        $highest_orders_object =  $highest_orders->first();


        $arr = [
            "Customer Number" => $highest_orders_object->customerNumber,
            "Customer Name" => $highest_orders_object->customerName,
            "Number of Orders" => $highest_orders_object->orders_count
        ];
        return $arr;
    }


    public function second()
    {

        /** The below code is for the customer who spent more money on orders.
         * $arr was declared in order to show the final result in a cleaner way.
         * The query was sorted by orderDate (asc) in order to display the first customer
         * who spent the most on orders.
         *
         * An eloquent relation was made both with orders and payments table as seen in the Customers model.
         *
         */

        $customers = Customers::with(['orders' => function ($query) {
            $query->orderBy('orderDate', 'asc');
        }, 'payments'])->withCount('orders')->get();


        $highest_order_amount = $customers->map(function ($amn, $key) {
            $amn['total_amount'] = collect($amn['payments'])->sum('amount');
            return $amn;
        })->sortByDesc('total_amount');
        $highest_order_amount =  $highest_order_amount->first();

        $arr = [
            "Customer Number" => $highest_order_amount->customerNumber,
            "Customer Name" => $highest_order_amount->customerName,
            "Total Amount" => number_format((float)$highest_order_amount->total_amount, 3, '.', '')
        ];
        return $arr;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
