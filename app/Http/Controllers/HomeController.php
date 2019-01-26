<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function pdf(Request $request)
    {
        $data = $request->all();
        // return view('pdf', compact('data'));

        $pdf = PDF::loadView('pdf', compact('data'))->setPaper('a3', 'potrait');
        return $pdf->download('invoice.pdf');
    }

    public function cache()
    {
        dd('here');
    }
}
