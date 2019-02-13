<?php

namespace App\Http\Controllers\Admin;

use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPdf;
use PDF;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
	public function create()
	{
		$products = Product::all();
		return view('pdf.create', compact('products'));
	}

	public function store(Request $request)
	{
		$data = $request->all();

		$blank_ticket_template = 'customer_receipt_'.strtotime('now').".pdf";
		$pdf1 = PDF::loadView('pdf-template.blank_receiving_ticket_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$blank_ticket_template);

		$blank_sale_order = 'sales_order_'.strtotime('now').".pdf";
		$pdf2 = PDF::loadView('pdf-template.blank_sale_order_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$blank_sale_order);

		$product_sample_ticket = 'product_sample_'.strtotime('now').".pdf";
		$pdf3 = PDF::loadView('pdf-template.product_sample_ticket_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$product_sample_ticket);

		return view('pdf.download', compact('blank_ticket_template', 'blank_sale_order', 'product_sample_ticket'));
	}

	public function sendMail(Request $request)
	{
		Mail::to($request->to_email)->send(new SendPdf($request->all()));
		return redirect()->route('pdf.create');
	}
}
