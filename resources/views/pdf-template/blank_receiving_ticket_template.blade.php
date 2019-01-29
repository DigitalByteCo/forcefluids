<?php 
$grandtotal = 0;
foreach($data['product_name'] as $k => $v) {
    if(!empty($v)) {
        $grandtotal = $grandtotal + $data['total'][$k];
    }
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" type="text/css" media="screen" rel="stylesheet">
</head>
<body id="pdf-div">
    <div class="container-fluid">
        <div class="row pdf_header_main">
            <p style="height: 10px;"></p>
            <div class="pdf_header_div">
                <div class="logo_container">
                    <img src="{{asset('images/logo.png')}}">
                </div>
                <div class="company_info">
                    <h3 class="color-blue">Force Fluids LLC</h3>
                    <p style="margin: 0px;">5431 Hwy 90E</p>
                    <p class="mb-5">Broussard, LA 70518</p>
                    <p>(337) 354-2350</p>
                </div>
            </div>
            <div class="pdf_header_div pull-right">
                <div class="text-right pick_up_div">
                    <label class="pull-right"><strong>PickUp Location(if applicable)</strong></label>
                    <br/>
                    <p>{{$data['pickup_location']}}</p>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <p class="color-blue" style="display: block; clear: both; height: 20px;"><strong>Customer Receiving Ticket</strong></p>
        <br/>
        <div class="row" style="display: block;">
            <div class="form_details">
                <label class="highlight-label">Date:</label>
                <p>{{$data['date']}}</p>
                <label class="highlight-label">Requested By:</label>
                <p>{{$data['requested_by']}}</p>
            </div>
            <div class="form_details">
                <label class="highlight-label">Company:</label>
                <p>{{$data['company']}}</p>
                <label class="highlight-label">PO # or N/A</label>
                <p>{{$data['po_or_na']}}</p>
            </div>
        </div>
        <div class="row" style="display: block;">
            <div class="table-responsive col-md-12">
                <table class="table table-bordered table-striped">
                    <thead class="bg-color-blue color-white">
                        <tr>
                            <th>Unit of Measure<br>(Pail, Tote, Gal)</th>
                            <th>Product</th>
                            <th>Product Application</th>
                            <th>Qty</th>
                            <th>Price Per Gal</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['product_name'] as $k => $v)
                        @if($v)
                        <tr>
                            <td>{{$data['unit'][$k]}}</td>
                            <td>{{$v}}</td>
                            <td>{{$data['product_application'][$k]}}</td>
                            <td>{{$data['qty'][$k]}}</td>
                            <td>${{$data['price'][$k]}}</td>
                            <td class="text-right">${{$data['total'][$k]}}</td>
                        </tr>
                        @endif
                        @endforeach
                        <tr style="background-color: #ccc;">
                            <td colspan="6">
                                <span>Total</span>
                                <span class="pull-right">${{$grandtotal}}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br/>
        <div class="row" style="display: block;">
            <div class="form_details">
                <label class="highlight-label">Customer Representative:</label>
                <p>{{$data['cust_rep']}}</p>
            </div>
            <div class="form_details">
                <label class="highlight-label">Warehouse Supervisor:</label>
                <p>{{$data['warehouse_supervisor']}}</p>
            </div>
        </div>
        <br/>
        <div class="row" style="display: block;">
            <div class="address_details border_bottom">
                <label><strong>Delivery Address (if applicable)</strong></label>
                <p>{{$data['driver_name']}}</p>
                <p>{{$data['street_address']}}</p>
                <p>{{$data['city_st_zip']}}</p>
                <p>{{$data['phone_no']}}</p>
            </div>
            <div class="address_details pull-right">
                <p>
                    <label class="pull-right" style="font-size: 13px;"><strong>*Please Note*</strong></label>
                </p>
                <br/>
                <p class="please_note_p">The products, quantities, and prices listed above are acurate and satisfactory to customer representative. Final price subject to change if tax and delivery are applicable. Acceptance of this order shall serve as intent to pay within agreed upon terms.</p>
            </div>
        </div>
    </div>
</body>
</html>