<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Force Fluids') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="pdf-div" class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="logo_container">
                    <img src="{{asset('images/logo.png')}}">
                </div>
                <div class="company_info">
                    <h3 class="color-blue">Force Fluids LLC</h3>
                    <p>5431 Hwy 90E</p>
                    <p class="mb-5">Broussard, LA 70518</p>
                    <p>(337) 354-2350</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pick_up_div pull-right mt-25">
                    <label><strong>PickUp Location(if applicable)</strong></label>
                    <p>{{$data['pickup_location']}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="color-blue"><strong>Customer Receiving Ticket</strong></p>
            </div>
            <div class="col-md-6 form_details">
                <label class="highlight-label">Date:</label>
                <p>{{$data['date']}}</p>
                <label class="highlight-label">Requested By:</label>
                <p>{{$data['requested_by']}}</p>
            </div>
            <div class="col-md-6 form_details">
                <label class="highlight-label">Company:</label>
                <p>{{$data['company']}}</p>
                <label class="highlight-label">PO # or N/A</label>
                <p>{{$data['po_or_na']}}</p>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="mt-25"></div>
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
                            <td>{{$data['price'][$k]}}</td>
                            <td>{{$data['total'][$k]}}</td>
                        </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td colspan="6">
                                <span>Total</span>
                                <span class="pull-right">123</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>