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
        // return view('pdf-template.blank_receiving_ticket_template', compact('data'));0
        // return view('pdf-template.blank_sale_order_template', compact('data'));
        // return view('pdf-template.product_sample_ticket_template', compact('data'));

        $pdf = PDF::loadView('pdf-template.product_sample_ticket_template', compact('data'))->setPaper('a3', 'potrait');
        return $pdf->download('invoice.pdf');
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
        dd('here');
    }
}
