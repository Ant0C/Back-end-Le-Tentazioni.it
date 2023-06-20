<?php

namespace App\Http\Controllers;

use App\Models\Shipments;
use App\Http\Requests\StoreShipmentsRequest;
use App\Http\Requests\UpdateShipmentsRequest;

class ShipmentsController extends Controller
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
     * @param  \App\Http\Requests\StoreShipmentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShipmentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipments  $shipments
     * @return \Illuminate\Http\Response
     */
    public function show(Shipments $shipments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipments  $shipments
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipments $shipments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShipmentsRequest  $request
     * @param  \App\Models\Shipments  $shipments
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShipmentsRequest $request, Shipments $shipments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipments  $shipments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipments $shipments)
    {
        //
    }
}
