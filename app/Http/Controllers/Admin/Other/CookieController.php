<?php

namespace App\Http\Controllers\Admin\Other;

use App\Cookie;
use Illuminate\Http\Request;

class CookieController extends \App\Http\Controllers\Controller
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
     * @param  \App\Cookie  $cookie
     * @return \Illuminate\Http\Response
     */
    public function show(Cookie $cookie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cookie  $cookie
     * @return \Illuminate\Http\Response
     */
    public function edit(Cookie $cookie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cookie  $cookie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cookie $cookie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cookie  $cookie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cookie $cookie)
    {
        abort(401);
    }
}
