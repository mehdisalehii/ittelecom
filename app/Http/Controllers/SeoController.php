<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreseoRequest;
use App\Http\Requests\UpdateseoRequest;
use App\Models\seo;

class SeoController extends \App\Http\Controllers\Controller
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
     * @param  \App\Http\Requests\StoreseoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreseoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function show(seo $seo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function edit(seo $seo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateseoRequest  $request
     * @param  \App\Models\seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateseoRequest $request, seo $seo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function destroy(seo $seo)
    {
        abort(401);
    }
}
