<?php

namespace App\Http\Controllers;

use App\Models\Waiters;
use App\Http\Requests\StoreWaitersRequest;
use App\Http\Requests\UpdateWaitersRequest;

class WaitersController extends Controller
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
     * @param  \App\Http\Requests\StoreWaitersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWaitersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Waiters  $waiters
     * @return \Illuminate\Http\Response
     */
    public function show(Waiters $waiters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Waiters  $waiters
     * @return \Illuminate\Http\Response
     */
    public function edit(Waiters $waiters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWaitersRequest  $request
     * @param  \App\Models\Waiters  $waiters
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWaitersRequest $request, Waiters $waiters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Waiters  $waiters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waiters $waiters)
    {
        //
    }
}
