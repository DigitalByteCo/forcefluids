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

        $blank_ticket_template = 'blank_receiving_ticket_'.strtotime('now').".pdf";
        $pdf1 = PDF::loadView('pdf-template.blank_receiving_ticket_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$blank_ticket_template);

        $blank_sale_order = 'blank_sales_order_'.strtotime('now').".pdf";
        $pdf2 = PDF::loadView('pdf-template.blank_sale_order_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$blank_sale_order);

        $product_sample_ticket = 'product_sample_ticket_'.strtotime('now').".pdf";
        $pdf3 = PDF::loadView('pdf-template.product_sample_ticket_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$product_sample_ticket);

        return view('download-pdf', compact('blank_ticket_template', 'blank_sale_order', 'product_sample_ticket'));
    }

    public function product(Request $request)
    {
        $products = Product::all();
        $data = $request->all();
        $data['prod_no']++;
        return view('add_product', compact('data', 'products'));
    }

    public function mailPdf(Request $request)
    {
        Mail::to($request->to_email)->send(new SendPdf($request->all()));
        return redirect()->route('home');
        dd($request->all());
    }

    public function cache()
    {
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        dd('here');
    }
}
