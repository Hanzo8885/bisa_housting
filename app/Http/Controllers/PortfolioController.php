<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function home()
    {
        return view('home', ['title' => 'Home – Alfikar Radestian Prasenja | Visual Designer']);
    }

    public function about()
    {
        return view('about', ['title' => 'About – Alfikar Radestian Prasenja']);
    }

    public function Biodata()
    {
        return view('Biodata', ['title' => 'Biodata – Alfikar Radestian Prasenja']);
    }

    public function Hobi()
    {
        return view('Hobi', ['title' => 'Hobi – Alfikar Radestian Prasenja']);
    }

    public function contact()
    {
        return view('contact', ['title' => 'Contact – Alfikar Radestian Prasenja']);
    }
}
