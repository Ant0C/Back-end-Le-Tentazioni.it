<?php

namespace App\Http\Controllers;

use App\Models\Order_item;
use App\Http\Requests\StoreOrder_itemRequest;
use App\Http\Requests\UpdateOrder_itemRequest;

class OrderItemController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrder_itemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder_itemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function show(Order_item $order_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_item $order_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrder_itemRequest  $request
     * @param  \App\Models\Order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder_itemRequest $request, Order_item $order_item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_item $order_item)
    {
        //
    }
}
