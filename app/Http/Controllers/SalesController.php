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
      $shelf = \App\Shelf::where('user_id', '=', '2')->get();
      $sale_type = ['retail', 'bid'];
      $today = date("Y-m-d");
      return view('sales.create', ['sale_type' => $sale_type, 'shelf' => $shelf, 'status' => 'processing', 'today' => $today]);
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
        'book_id' => 'required',
        'sale_type' => 'required',
        'base_price' => 'required',
        'bank_name' => 'required',
        'branch' => 'required',
        'account_num' => 'required',
        'holder' => 'required',
        'book_condition' => 'required',
        'images[]' => 'mimes:jpeg,bmp,png|max:2048'
      ]);

      $sale = new Sale;
      $sale->seller_id = 2;
      $sale->book_id = $request->input('book_id');
      $sale->base_price = $request->input('base_price');
      $sale->sale_type = $request->input('sale_type');
      $sale->status = 'processing';
      if ($request->input('sale_type')=='bid') {
        $sale->start_time = $request->input('start_time');
        $sale->end_time = $request->input('end_time');
      }
      $sale->payment = $request->input('bank_name') . ' ' .
                       $request->input('branch') . ' ' .
                       $request->input('account_num') . ' ' .
                       $request->input('holder');
      $sale->book_condition = $request->input('book_condition');

      $sale->save();

      $input=$request->all();
      $images=array();
      $img = new \App\Image;
      $img->sale_id = $sale->id;
      if($files=$request->file('images')){
        $count = 0;
          foreach($files as $file){
              $name=$file->getClientOriginalExtension();
              $upload = $file->move(public_path() . '/sale_images' . '/', 'sale_images' . $sale->seller_id . $count . '.' . $name);
              $img->path = '/sale_images' . '/' . 'sale_images' . $sale->seller_id . $count . '.' . $name;
              $count++;
          }
      }
      $img->save();

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
      $today = date("Y-m-d");
      $m = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      $data = $sale->created_at;
      $dnt = explode(' ', $data);
      $d = explode('-', $dnt[0]);
      $created_date = $d[2] ." ". $m[(int)$d[1]] .", ". $d[0];
      $img = \App\Image::where('sale_id', '=', $sale->id)->get();
      return view('sales.show', ['sale' => $sale, 'created_date' => $created_date, 'img'=>$img]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
      $sale_type = ['retail', 'bid'];
      $status = ['processing', 'delivered', 'recieved'];
      $today = date("Y-m-d");

      return view('sales.edit', ['sale_type' => $sale_type, 'status' => $status, 'today' => $today]);
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
      $validatedData = $request->validate([
        'book_id' => 'required|min:3|max:255',
        'sale_type' => 'required',
        'base_price' => 'required',
        'total_price' => 'required',
        'bank_name' => 'required',
        'branch' => 'required',
        'account_num' => 'required',
        'holder' => 'required',
        'book_condition' => 'required',
        'images[]' => 'mimes:jpeg,bmp,png|max:2048'
      ]);

      $sale->seller_id = 2;
      $sale->book_id = $request->input('book_id');
      $sale->base_price = $request->input('base_price');
      $sale->sale_type = $request->input('sale_type');
      $sale->status = $request->input('status');
      if ($request->input('sale_type')=='bid') {
        $sale->start_time = $request->input('start_time');
        $sale->end_time = $request->input('end_time');
      }
      $sale->payment = $request->input('bank_name') . ' ' .
                       $request->input('branch') . ' ' .
                       $request->input('account_num') . ' ' .
                       $request->input('holder');
      $sale->save();

      $input=$request->all();
      $images=array();
      $img = new \App\Image;
      $img->sale_id = $sale->id;
      if($files=$request->file('images')){
        $count = 0;
          foreach($files as $file){
              $name=$file->getClientOriginalExtension();
              $upload = $file->move(public_path() . '/sale_images' . '/', 'sale_images' . $sale->seller_id . $count . '.' . $name);
              $img->path = '/sale_images' . '/' . 'sale_images' . $sale->seller_id . $count . '.' . $name;
              $count++;
          }
      }
      $img->save();

      return redirect('/sales/' . $sale->id);
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
