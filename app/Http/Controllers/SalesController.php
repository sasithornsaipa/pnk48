<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', ['sales'=>$sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $shelf = \App\Shelf::where('user_id', '=', \Auth::user()->id)->get();
      $books = [];
      foreach ($shelf as $book) {
        $books[] = \App\Book::where('id', '=', $book->book_id )->get();
      }
      $sale_type = ['retail', 'bid'];
      $today = date("Y-m-d");
      return view('sales.create', ['sale_type' => $sale_type, 'shelf' => $shelf, 'status' => 'processing', 'today' => $today, 'books' => $books]);
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
      $sale->seller_id = $request->user()->id;
      $sale->book_id = $request->input('book_id');
      $sale->base_price = $request->input('base_price');
      $sale->sale_type = $request->input('sale_type');
      $sale->status = 'processing';
      if ($request->input('sale_type')=='bid') {
        $sale->start_time = $request->input('start_time');
        $sale->end_time = $request->input('end_time');
      }
      $sale->payment = $request->input('bank_name') . '/' .
                       $request->input('branch') . '/' .
                       $request->input('account_num') . '/' .
                       $request->input('holder');
      $sale->book_condition = $request->input('book_condition');

      $sale->save();

      $input=$request->all();
      $images=array();
      if($files=$request->file('images')){
        $count = 0;
          foreach($files as $file){
              $img = new \App\Image;
              $img->sale_id = $sale->id;
              $name=$file->getClientOriginalExtension();
              $upload = $file->move(public_path() . '/sale_images' . '/', 'sale_images' . $sale->id . $sale->book_id . $count . '.' . $name);
              $img->path = '/sale_images' . '/' . 'sale_images' . $sale->id . $sale->book_id . $count . '.' . $name;
              $img->save();
              $count++;
          }
      }

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
      $info = explode('/', $sale->payment);
      return view('sales.show', ['sale' => $sale, 'created_date' => $created_date, 'img'=>$img, 'info'=>$info]);
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
        'sale_type' => 'required',
        'base_price' => 'required',
        'bank_name' => 'required',
        'branch' => 'required',
        'account_num' => 'required',
        'holder' => 'required',
        'book_condition' => 'required',
        'images[]' => 'mimes:jpeg,bmp,png|max:2048'
      ]);

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
      if($files=$request->file('images')){
        $count = 0;
          foreach($files as $file){
              $img = new \App\Image;
              $img->sale_id = $sale->id;
              $name=$file->getClientOriginalExtension();
              $upload = $file->move(public_path() . '/sale_images' . '/', 'sale_images' . $sale->id . $sale->book_id . $count . '.' . $name);
              $img->path = '/sale_images' . '/' . 'sale_images' . $sale->id . $sale->book_id . $count . '.' . $name;
              $img->save();
              $count++;
          }
      }

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
      $sale->delete();
      return redirect('/sales');
    }

    /**
     * Show the form for order processing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function buying(Sale $sale)
    {
      $today = date("Y-m-d");
      $book = \App\Book::where('id', '=', $sale->book_id )->get();
      $profiles = \App\Profile::where('user_id', '=', '2' )->get();
      $coupons =  \App\Coupon::where('exp', '>=', $today )->get();
      $address = explode("\\", $profiles[0]->address);
      $sale_type = ['retail', 'bid'];

      return view('buying.create', ['sale'=>$sale, 'sale_type' => $sale_type, 'book' => $book,
                                    'profiles'=>$profiles, 'coupons'=>$coupons, 'address'=>$address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function updatedb(Request $request, Sale $sale)
    {
      // return $request->input('total_price');
      $sale->buyer_id = $request->user()->id;
      $sale->total_price = $request->input('total_price');
      $sale->status = 'purchased';
      $sale->save();
      $buyer = \App\Profile::where('user_id', '=', $request->user()->id )->get();
      $buyer[0]->coin = $buyer[0]->coin - $request->input('total_price');
      $buyer[0]->save();
      $seller = \App\Profile::where('user_id', '=', $sale->seller_id )->get();
      $seller[0]->coin = $seller[0]->coin - $request->input('total_price');
      $seller[0]->save();
      return redirect('/buying/success');
    }

    /**
     * Show the form for order processing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function confirm(Sale $sale)
    {
      $today = date("Y-m-d");
      return view('buying.confirmpayment', ['sale'=>$sale, 'today'=>$today]);
    }
    /**
     * Show the form for order processing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
      return view('buying.success');
    }
}
