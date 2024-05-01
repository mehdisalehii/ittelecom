<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Profile $profile)
    {
        //
    }
    public function edit(Profile $profile)
    {
        //
    }
    public function update(Request $request, Profile $profile)
    {
        //
    }
    public function destroy(Profile $profile)
    {
        abort(401);
    }
}
