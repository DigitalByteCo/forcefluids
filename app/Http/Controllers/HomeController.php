<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPdf;
use Artisan;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function product(Request $request)
    {
        $products = Product::all();
        $data = $request->all();
        $data['prod_no']++;
        return view('add_product', compact('data', 'products'));
    }

    public function cache()
    {
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        dd('here');
    }
}
