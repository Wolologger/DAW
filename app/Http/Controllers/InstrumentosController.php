<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstrumentosController extends Controller
{
    //
    public function index()
    {
        return view('pag/instrumento');
    }
}
