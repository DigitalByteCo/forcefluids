@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Sales Form</div>
                <div class="card-body">
                    <form method="post" action="{{route('pdf')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date" class=" form-control-label">Date</label>
                                    <input type="text" id="date" name="date" placeholder="Date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="requested_by" class=" form-control-label">Requested By</label>
                                    <input type="text" id="requested_by" name="requested_by" placeholder="Requested By" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Company</label>
                                    <input type="text" id="company" name="company" placeholder="Company" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pickup_location" class=" form-control-label">Pickup Location</label>
                                    <input type="text" id="pickup_location" name="pickup_location" placeholder="Pickup Location" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="force_team_sales_rep" class=" form-control-label">Force Team Sales Rep</label>
                                    <input type="text" id="force_team_sales_rep" name="force_team_sales_rep" placeholder="Force Team Sales Rep" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="purchase_approved_by" class=" form-control-label">Purchase Approved By</label>
                                    <input type="text" id="purchase_approved_by" name="purchase_approved_by" placeholder="Purchase Approved By" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="po_or_na" class="form-control-label">PO # or N/A</label>
                                    <input type="text" id="po_or_na" name="po_or_na" placeholder="PO # or N/A" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p>Delivery Address</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="driver_name" class=" form-control-label">Driver Name or NA</label>
                                    <input type="text" id="driver_name" name="driver_name" placeholder="Driver Name or NA" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="street_address" class=" form-control-label">Street Address</label>
                                    <input type="text" id="street_address" name="street_address" placeholder="Street Address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="city_st_zip" class=" form-control-label">City, State, Zip</label>
                                    <input type="text" id="city_st_zip" name="city_st_zip" placeholder="City, State, Zip" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_no" class=" form-control-label">phone no</label>
                                    <input type="text" id="phone_no" name="phone_no" placeholder="Phone No." class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="please_note" class=" form-control-label">Please Note</label>
                                    <textarea type="text" id="please_note" name="please_note" placeholder="Please Note" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p>Product Details</p>
                        <div class="row all_product">
                            @for($i=1; $i<= 20; $i++)
                            <div class="col-md-3 col-xs-12 product_main_div" id="product_main_div_{{$i}}" data-no="{{$i}}">
                                <div class="form-group">
                                    <label for="product_name_{{$i}}" class=" form-control-label">Product {{$i}}</label>
                                    <select id="product_name_{{$i}}" name="product_name[]" class="form-control product_name" data-no="{{$i}}">
                                        <option value="0">Select Product</option>
                                        @foreach($products as $p)
                                        <option value="{{$p->name}}" data-price="{{$p->price}}" data-app="{{$p->application}}">{{$p->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="unit_{{$i}}" class=" form-control-label">Unit of Measurement</label>
                                    <select id="unit_{{$i}}" name="unit[]" class="form-control" data-no="{{$i}}">
                                        <option value="Pail">Pail</option>
                                        <option value="Tote">Tote</option>
                                        <option value="Gallon">Gallon</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product_application_{{$i}}" class=" form-control-label">Product Application</label>
                                    <input type="text" id="product_application_{{$i}}" name="product_application[]" placeholder="Product Application" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="qty_{{$i}}" class="form-control-label">Qty</label>
                                    <input type="text" id="qty_{{$i}}" name="qty[]" class="form-control qty_txt" data-no="{{$i}}">
                                </div>
                                <div class="form-group">
                                    <label for="price_{{$i}}" class="form-control-label">Price Per Galon</label>
                                    <input type="text" id="price_{{$i}}" name="price[]" class="form-control price_txt" data-no="{{$i}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Total</label>
                                    <input type="text" id="total_{{$i}}" name="total[]" class="form-control total" readonly="readonly">
                                </div>
                                <hr>
                            </div>
                            @endfor
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $(".product_name").change(function(){
            var i = $(this).data("no");
            var price = $("option:selected", this).data("price");
            var application = $("option:selected", this).data("app");
            $("#product_application_"+i).val(application);
            $("#price_"+i).val(price);
        });

        $(".price_txt").on("keypress, change, keyup", function() {
            var  i = $(this).data("no");
            var price = $(this).val();
            var qty = $("#qty_"+i).val();
            var total = parseFloat(price)*parseInt(qty);
            $("#total_"+i).val(total);
        });

        $(".qty_txt").on("keypress, change, keyup", function() {
            var  i = $(this).data("no");
            var qty = $(this).val();
            var price = $("#price_"+i).val();
            var total = parseFloat(price)*parseInt(qty);
            $("#total_"+i).val(total);
        });
    });
</script>
@endsection