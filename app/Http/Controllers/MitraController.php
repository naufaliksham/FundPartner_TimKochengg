<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {

    return view("mitra.index");
    }

    public function create()
    {

    return view("mitra.create");
    }
}
