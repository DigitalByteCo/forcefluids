@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Sales Order</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{route('home')}}">Dashboard</a></li>
                            <li><a href="{{route('sales-order.index')}}">Sales Order</a></li>
                            <li class="active">View</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Sales Order Details</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Date</label>
                                <p>{{$sales_order->date}}</p>
                            </div>
                            <div class="col-md-6">
                                <label>Force Team Sales Rep</label>
                                <p>{{$sales_order->force_team_sales_rep}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Company</label>
                                <p>{{$sales_order->company->name}}</p>
                            </div>
                            <div class="col-md-6">
                                <label>Purchase Approved By</label>
                                <p>{{$sales_order->purchase_approved_by}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Location Type</label>
                                <p>{{ucfirst($sales_order->location_type)}}</p>
                                @if($sales_order->location_type == 'pickup')
                                <label>Pick Up Location</label>
                                <p>{{ucfirst($sales_order->pickupLocation->address)}}</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label>PO # or N/A</label>
                                <p>{{$sales_order->po_or_na}}</p>
                            </div>
                        </div>
                        <hr>
                        <p>Delivery Address</p>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Driver Name or NA</label>
                                <p>{{$sales_order->driver_name}}</p>
                            </div>
                            <div class="col-md-6">
                                <label>Phone Number</label>
                                <p>{{$sales_order->phone_no}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Street Address</label>
                                <p>{{$sales_order->street_address}}</p>
                            </div>
                            <div class="col-md-6">
                                <label>Customer Representative</label>
                                <p>{{$sales_order->cust_rep}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>City, State, Zip</label>
                                <p>{{$sales_order->city_st_zip}}</p>
                            </div>
                            <div class="col-md-6">
                                <label>Warehouse Supervisor</label>
                                <p>{{$sales_order->warehouse_supervisor}}</p>
                            </div>
                        </div>
                        <hr>
                        <p>Products</p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales_order->salesOrderProducts as $p)
                                    <tr>
                                        <td>{{$p->product->name}}</td>
                                        <td>{{$p->qty}}</td>
                                        <td>{{$p->price}}</td>
                                        <td>{{$p->total}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
