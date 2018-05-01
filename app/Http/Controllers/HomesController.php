<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Book;

class homesController extends Controller
{
    public function index() {
      $books = Book::all();
      return view('home.index', ['books'=>$books]);
    }
}
