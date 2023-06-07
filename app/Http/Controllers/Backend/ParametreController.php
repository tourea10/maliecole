<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class ParametreController extends Controller
{
    public function index()
    {
        return view('backend.parametre.index');
    }
}
