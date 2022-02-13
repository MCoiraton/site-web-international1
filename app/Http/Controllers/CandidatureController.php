<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    public function show() 
    {
        return view('fiche_candidature');
    }

    public function store(Request $request) 
    {

    }
}