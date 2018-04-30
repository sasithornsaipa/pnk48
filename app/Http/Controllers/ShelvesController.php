<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Shelf;
use Illuminate\Http\Request;

class ShelvesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Auth::user id
        $shelfs = Shelf::all()->where('user_id', 2);

        // $books = Book::all()->where('book_id', $shelfs->book_id);
        return view('shelfbook/index', ['shelfs' => $shelfs ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = User::all()->where('id',2)->pluck('id');
        
        return view('shelfbook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user_id = User::all()->where('id',2)->pluck('id');
        $book = new Book;
        $book->name = $request->input('name');
        $book->isbn = $request->input('isbn');
        // $book->cover = $request->input('cover');
        $book->barcode = $request->input('barcode');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->save();

        $shelf = new Shelf;
        $shelf->user_id = 2;
        $shelf->book_id = $book->id;
        $shelf->save();
        return redirect('/shelfbook/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function show(Shelf $shelf)
    {
        // $shelfs = Shelf::all()->where('user_id', 2);

        $book = $shelf->book_id;
        // $bookdetail = User::find($book);
        // return view('shelfbook/show', ['shelf' => $shelf, 'bookdetail' => $bookdetail ]);
        return view('shelfbook/show', ['book' => $book]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function edit(Shelf $shelf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shelf $shelf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shelf $shelf)
    {
        //
    }

    public function showBook(Book $book)
    {
        // $shelfs = Shelf::all()->where('user_id', 2);
        // $bookdetail = Book::find($book);
        $bookdetail = Book::find($book);
        // $book = $book->book_id;
        // $bookdetail = User::find($book);
        // return view('shelfbook/show', ['shelf' => $shelf, 'bookdetail' => $bookdetail ]);
        return view('shelfbook/show', ['bookdetail' => $bookdetail]);

    }

}
