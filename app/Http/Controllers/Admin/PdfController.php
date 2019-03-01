<?php

namespace App\Http\Controllers\Admin;

use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPdf;
use Auth;
use PDF;
use Storage;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    private $drive;

    public function __construct(Google_Client $client)
    {
        $this->middleware('check.pdf');

        $this->middleware(function ($request, $next) use ($client) {
            $client->refreshToken(Auth::user()->refresh_token);
            $this->drive = new Google_Service_Drive($client);
            return $next($request);
        });
    }

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
        $this->createFile($blank_ticket_template);

        $blank_sale_order = 'sales_order_'.strtotime('now').".pdf";
        $pdf2 = PDF::loadView('pdf-template.blank_sale_order_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$blank_sale_order);
        $this->createFile($blank_sale_order);

        $product_sample_ticket = 'product_sample_'.strtotime('now').".pdf";
        $pdf3 = PDF::loadView('pdf-template.product_sample_ticket_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$product_sample_ticket);
        $this->createFile($product_sample_ticket);

        return view('pdf.download', compact('blank_ticket_template', 'blank_sale_order', 'product_sample_ticket'));
    }

    public function sendMail(Request $request)
    {
        Mail::to($request->to_email)->send(new SendPdf($request->all()));
        return redirect()->route('pdf.create');
    }

    private function createFile($name)
    {
        $content = Storage::get('public/pdf/'.$name);
        $mimeType = Storage::mimeType('public/pdf/'.$name);

        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => $name,
            'parent' => "root"
        ]);

        $file = $this->drive->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => $mimeType,
            'uploadType' => 'multipart',
            'fields' => 'id'
        ]);
    }
}
