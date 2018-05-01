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
        $shelfs = Shelf::all()->where('user_id', \Auth::user()->id);
        $books = [];
        foreach ($shelfs as $book) {
            $books[] = \App\Book::where('id', '=', $book->book_id )->get();
        }
        return view('shelfbook/index', ['shelfs' => $shelfs , 'books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = User::all()->where('id',2)->pluck('id');
        return view('shelfbook.create', ['error' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'barcode' => 'required|min:13|max:13',
            'isbn' => 'required|min:13|max:13',
            'images[]' => 'mimes:jpeg,bmp,png|max:2048'
        ]);
        
            $book = new Book;
            $book->name = $request->input('name');
            // $book->cover = $request->input('name') . '.jpg';
            $book->author = $request->input('author');
            $book->description = $request->input('description');
            $book->isbn = $request->input('isbn');
            $book->barcode = $request->input('barcode');
            
            $input=$request->all();
            $images=array();
            if($files=$request->file('images')){
                foreach($files as $file){
                    $name=$file->getClientOriginalExtension();
                    $upload = $file->move(public_path() . '/img' . '/', $request->input('name') . '.' . $name);
                    $book->cover = '/img' . '/'. $request->input('name') . '.' . $name;
                }
            }
            $book->save();

            $shelf = new Shelf;
            $shelf->user_id = \Auth::user()->id;
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
        return view('shelfbook/show', ['book' => $book]);
    }

    public function addbook(Request $request){
        $validatedData = $request->validate([
            'barcode' => 'required|min:13|max:13|unique:books,barcode',
            'isbn' => 'required|min:13|max:13|unique:books,isbn'
        ]);
        
        $barcode = null;
        $isbn = null;
        $error = null;

        $barcode_in = $request->input('barcode');
        $isbn_in = $request->input('isbn');
      
        $bookCheckBarcode = \App\Book::where('barcode', $isbn_in)->first();
        $bookCheckIsbn = \App\Book::where('isbn', $isbn_in)->first();

        if($bookCheckBarcode == null || $bookCheckIsbn == null){
            $barcode = $barcode_in;
            $isbn = $isbn_in;
            // return view('/shelfbook/addbook', ['isbn' => $isbn, 'barcode'=>$barcode, 'error'=>$error]);
        }
        else{
            $error = "You have this book in your shelf";
            
            // return view('/shelfbook/create', ['error' => $error]);
        }
        return view('/shelfbook/addbook', ['isbn' => $isbn, 'barcode'=>$barcode, 'error'=>$error]);
       
    }
}
