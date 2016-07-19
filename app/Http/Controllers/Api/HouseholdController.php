<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HouseholdController extends Controller
{
    public function show($id)
    {
        return \App\Household::findOrFail($id);
    }
}