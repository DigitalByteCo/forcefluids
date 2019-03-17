<?php

namespace App\Http\Controllers\Admin;

use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;
use App\Model\Product;
use App\Model\PickupLocation;
use App\Model\Company;
use App\Model\SalesOrder;
use App\Model\SalesOrderProduct;
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

    public function index()
    {
        $orders = SalesOrder::all();
        return view('pdf.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        $locations = PickupLocation::all();
        $companies = Company::all();

        return view('pdf.create', compact('products', 'locations', 'companies'));
    }

    public function store(Request $request, Google_Client $client)
    {
        $data = $request->all();
        $data['date'] = date('Y-m-d', strtotime($data['date']));
        $order = new SalesOrder;
        $order->user_id = $request->user()->id;
        $order->fill($data);
        if($data['location_type'] === 'pickup') {
            $order->pickup_location_id = $data['pickup_location_id'];
        }

        $this->_createSalesOrderPdf($order, $data);

        $order->save();

        $this->_saveSalesOrderProducts($order, $data);

        if(!empty($request->user()->refresh_token)) {
            $client->refreshToken($request->user()->refresh_token);
            $this->drive = new Google_Service_Drive($client);
            $id = $this->getFolderID();

            if(!empty($data['customer_receipt'])) {
                $this->createFile($order->customer_receipt_file, $id);
            }
            if(!empty($data['sales_order'])){
                $this->createFile($order->sales_order_file, $id);
            }
            if(!empty($data['product_sample'])) {
                $this->createFile($order->product_sample_file, $id);
            }
        }
        return redirect()->route('sales-order.download', $order);
    }

    public function show(SalesOrder $sales_order)
    {
        return view('pdf.view', compact('sales_order'));
    }

    public function sendMail(Request $request)
    {
        Mail::to($request->to_email)->send(new SendPdf($request->all()));
        return redirect()->route('sales-order.create');
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

    private function _saveSalesOrderProducts($order, $data)
    {
        foreach ($data['product_name'] as $key => $value) {
            $salesOrderProduct = new SalesOrderProduct;
            if($value == 'other') {
                $product = new Product;
                $product->name = $data['other_prod'][$key];
                $product->application = $data['product_application'][$key];
                $product->price = $data['price'][$key];
                $product->save();
                $salesOrderProduct->product_id = $product->id;
            } else {
                $salesOrderProduct->product_id = $value;
            }

            $salesOrderProduct->unit = $data['unit'][$key];
            $salesOrderProduct->qty = $data['qty'][$key];
            $salesOrderProduct->price = $data['price'][$key];
            $salesOrderProduct->total = $data['qty'][$key] * $data['price'][$key];

            $order->salesOrderProducts()->save($salesOrderProduct);
        }
    }

    private function _createSalesOrderPdf($order, $data)
    {
        $company = Company::find($data['company_id']);
        $location = PickupLocation::find($data['pickup_location_id']);
        $company = strtolower($company->name);
        $company = str_replace(" ", "_", $company);
        $date = date("Y_m_d_H_i_s");

        $blank_ticket_template = 'customer_receipt_'.$company.'_'.$date.".pdf";
        $pdf1 = PDF::loadView('pdf-template.blank_receiving_ticket_template', compact('data', 'location', 'company'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$blank_ticket_template);

        $blank_sale_order = 'sales_order_'.$company.'_'.$date.".pdf";
        $pdf2 = PDF::loadView('pdf-template.blank_sale_order_template', compact('data', 'location', 'company'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$blank_sale_order);

        $product_sample_ticket = 'product_sample_'.$company.'_'.$date.".pdf";
        $pdf3 = PDF::loadView('pdf-template.product_sample_ticket_template', compact('data', 'location', 'company'))->setPaper('a3', 'potrait')->save('../storage/app/public/pdf/'.$product_sample_ticket);

        $order->customer_receipt_file = $blank_ticket_template;
        $order->sales_order_file = $blank_sale_order;
        $order->product_sample_file = $product_sample_ticket;
    }

    public function download(SalesOrder $order)
    {
        return view('pdf.download', compact('order'));
    }
}
