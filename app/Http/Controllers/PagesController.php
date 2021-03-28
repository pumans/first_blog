<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contacts(){
        return view('contacts');
    }
    public function about(){
        return view('about');
    }
    public function services(){
        return view('services');
    }

}
