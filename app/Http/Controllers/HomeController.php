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
        // return view('pdf-template.blank_receiving_ticket_template', compact('data'));
        // return view('pdf-template.blank_sale_order_template', compact('data'));
        // return view('pdf-template.product_sample_ticket_template', compact('data'));

        $blank_ticket_template = 'blank_receiving_ticket_'.strtotime('now');
        $pdf1 = PDF::loadView('pdf-template.blank_receiving_ticket_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/pdf/'.$blank_ticket_template.'.pdf');

        $blank_sale_order = 'blank_sales_order_'.strtotime('now');
        $pdf2 = PDF::loadView('pdf-template.blank_sale_order_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/pdf/'.$blank_sale_order.'.pdf');

        $product_sample_ticket = 'product_sample_ticket_'.strtotime('now');
        $pdf3 = PDF::loadView('pdf-template.product_sample_ticket_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/pdf/'.$product_sample_ticket.'.pdf');

        return redirect()->route('home');
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
