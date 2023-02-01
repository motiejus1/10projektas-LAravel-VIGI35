<?php

namespace App\Http\Controllers;

use App\Models\Allowedmethod;
use App\Http\Requests\StoreAllowedmethodRequest;
use App\Http\Requests\UpdateAllowedmethodRequest;

class AllowedmethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allowedmethods = Allowedmethod::all();
        return view('allowedmethods.index', ['allowedmethods' => $allowedmethods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('allowedmethods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAllowedmethodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAllowedmethodRequest $request)
    {
        $allowedmethod = new Allowedmethod();

        $allowedmethod->name = $request->name;
        $allowedmethod->url = $request->url;
        $allowedmethod->save();

        return redirect()->route('allowedmethods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Allowedmethod  $allowedmethod
     * @return \Illuminate\Http\Response
     */
    public function show(Allowedmethod $allowedmethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Allowedmethod  $allowedmethod
     * @return \Illuminate\Http\Response
     */
    public function edit(Allowedmethod $allowedmethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAllowedmethodRequest  $request
     * @param  \App\Models\Allowedmethod  $allowedmethod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAllowedmethodRequest $request, Allowedmethod $allowedmethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Allowedmethod  $allowedmethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allowedmethod $allowedmethod)
    {
        //
    }
}
