<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Sale;

class homesController extends Controller
{
    public function index() {
      $books = Sale::all();
      return view('home.index', ['books'=>$books]);
    }
}
