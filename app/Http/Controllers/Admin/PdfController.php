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

    public function __construct()
    {
        $this->middleware('check.pdf');
    }

    public function create()
    {
        $products = Product::all();
        return view('pdf.create', compact('products'));
    }

    public function store(Request $request, Google_Client $client)
    {
        $data = $request->all();
        $company = strtolower($data['company']);
        $company = str_replace(" ", "_", $company);
        $date = date("Y_m_d_H_i_s");

        $blank_ticket_template = 'customer_receipt_'.$company.'_'.$date.".pdf";
        $pdf1 = PDF::loadView('pdf-template.blank_receiving_ticket_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$blank_ticket_template);

        $blank_sale_order = 'sales_order_'.$company.'_'.$date.".pdf";
        $pdf2 = PDF::loadView('pdf-template.blank_sale_order_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$blank_sale_order);

        $product_sample_ticket = 'product_sample_'.$company.'_'.$date.".pdf";
        $pdf3 = PDF::loadView('pdf-template.product_sample_ticket_template', compact('data'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$product_sample_ticket);

        if(!empty($request->user()->refresh_token)) {
            $client->refreshToken($request->user()->refresh_token);
            $this->drive = new Google_Service_Drive($client);
            $id = $this->getFolderID();

            $this->createFile($blank_ticket_template, $id);
            $this->createFile($blank_sale_order, $id);
            $this->createFile($product_sample_ticket, $id);
        }
        return view('pdf.download', compact('blank_ticket_template', 'blank_sale_order', 'product_sample_ticket'));
    }

    public function sendMail(Request $request)
    {
        Mail::to($request->to_email)->send(new SendPdf($request->all()));
        return redirect()->route('pdf.create');
    }

    private function createFile($name, $id)
    {
        $content = Storage::get('public/pdf/'.$name);
        $mimeType = Storage::mimeType('public/pdf/'.$name);

        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => $name,
            'parents' => [$id]
        ]);

        $file = $this->drive->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => $mimeType,
            'uploadType' => 'multipart',
            'fields' => 'id'
        ]);
    }

    private function getFolderID($id = 'root')
    {
        $query = "mimeType='application/vnd.google-apps.folder' and '".$id."' in parents and trashed=false";
        $optParams = [
            'fields' => 'files(id, name)',
            'q' => $query
        ];

        $results = $this->drive->files->listFiles($optParams);

        $id = "";
        if (count($results->getFiles()) > 0) {
            foreach ($results->getFiles() as $file) {
                if($file->getName() === 'ForceFluids') {
                    $id = $file->getID();
                }
            }
        }

        if(empty($id)) {
            $id = $this->createFolder('ForceFluids');
        }
        return $id;
    }

    private function createFolder($folder_name)
    {
        $folder_meta = new Google_Service_Drive_DriveFile(array(
            'name' => $folder_name,
            'mimeType' => 'application/vnd.google-apps.folder'));
        $folder = $this->drive->files->create($folder_meta, array(
            'fields' => 'id'));
        return $folder->id;
    }
}
