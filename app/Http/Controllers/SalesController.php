<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $sale_type = ['retail', 'bid'];
      $status = ['processing', 'delivered', 'recieved'];

      return view('sales.create', ['sale_type' => $sale_type, 'status' => $status]);
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
        'book_id' => 'required|min:3|max:255',
        'sale_type' => 'required',
        'base_price' => 'required',
        'total_price' => 'required',
        'payment' => 'required',
        'images[]' => 'mimes:jpeg,bmp,png|max:2048'
      ]);

      $sale = new Sale;
      $sale->seller_id = 2;
      $sale->book_id = $request->input('book_id');
      $sale->base_price = $request->input('base_price');
      $sale->sale_type = $request->input('sale_type');
      $sale->status = $request->input('status');
      $sale->start_time = $request->input('start_time');
      $sale->end_time = $request->input('end_time');
      $sale->payment = $request->input('payment');

      $input=$request->all();
      $images=array();
      if($files=$request->file('images')){
          foreach($files as $file){
              $name=$file->getClientOriginalName();
              // $upload = $file->storeAs('sale_images/',$name);
              $sale->image_path = 'sale_images' . '/' . $name;
          }
      }

      $sale->save();

      return redirect('/sales/' . $sale->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
