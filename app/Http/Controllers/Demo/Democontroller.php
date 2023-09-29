<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Democontroller extends Controller
{
    public function Index(){
      return view('about');

    }
    //
    public function ContactMethod(){
      return view('contact');

    }
}
