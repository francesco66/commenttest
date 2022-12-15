<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Home
    public function index()
    {
        return view('home');
    }

    // Manifesto
    public function manifesto()
    {
        return view('manifesto');
    }

    // Fardelli d'Italia - About (logo)
    public function fardelliditalia()
    {
        return view('fardelliditalia');
    }

}
