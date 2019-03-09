@extends('layouts.app')

@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>New Sales Order</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{route('home')}}">Dashboard</a></li>
                            <li class="active">Sales Order</li>
                            <li class="active">Create</li>
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
                        <strong class="card-title">Force Fluids Sales Order Form</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('pdf.store')}}" id="salesForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-5">
                                    <div class="form-group">
                                        <label for="date" class=" form-control-label">Date</label>
                                        <input type="text" id="date" name="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="requested_by" class=" form-control-label">Requested By</label>
                                        <input type="text" id="requested_by" name="requested_by" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Company</label>
                                        <input type="text" id="company" name="company" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div class="col col-md-12">
                                            <label class=" form-control-label">Location Type</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label for="inline-radio1" class="form-check-label ">
                                                    <input type="radio" id="inline-radio1" name="location_type" value="pickup" class="form-check-input" checked="checked">Pick Up
                                                </label>&nbsp;
                                                <label for="inline-radio2" class="form-check-label ">
                                                    <input type="radio" id="inline-radio2" name="location_type" value="delivery" class="form-check-input">Delivery
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group pickup_location_div">
                                        <label for="pickup_location" class=" form-control-label">Pickup Location</label>
                                        <select name="pickup_location" class="form-control">
                                            <option value="Force Headquarters Broussard, LA  5431 Highway 90 E. Broussard, LA 70518">Force Headquarters Broussard, LA  5431 Highway 90 E. Broussard, LA 70518</option>
                                            <option value="Diversified Warehouse 600 Industrial Ave., OdesTX, 79761">Diversified Warehouse 600 Industrial Ave., OdesTX, 79761</option>
                                            <option value="Ray West warehouse 4801 Baldwin Blvd, Corpus Christi, TX 78408">Ray West warehouse 4801 Baldwin Blvd, Corpus Christi, TX 78408</option>
                                            <option value="Ray West warehouse 4801 Baldwin Blvd, Corpus Christi, TX 78408">Jones Road Warehouse 5969 Jones Rd, Bryan, TX 77807</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="force_team_sales_rep" class=" form-control-label">Force Team Sales Rep</label>
                                        <input type="text" id="force_team_sales_rep" name="force_team_sales_rep" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="purchase_approved_by" class=" form-control-label">Purchase Approved By</label>
                                        <input type="text" id="purchase_approved_by" name="purchase_approved_by" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="po_or_na" class="form-control-label">PO # or N/A</label>
                                        <input type="text" id="po_or_na" name="po_or_na" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p>Delivery Address</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="driver_name" class=" form-control-label">Driver Name or NA</label>
                                        <input type="text" id="driver_name" name="driver_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="street_address" class=" form-control-label">Street Address</label>
                                        <input type="text" id="street_address" name="street_address" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="city_st_zip" class=" form-control-label">City, State, Zip</label>
                                        <input type="text" id="city_st_zip" name="city_st_zip" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_no" class=" form-control-label">Phone Number</label>
                                        <input type="text" id="phone_no" name="phone_no" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="please_note" class=" form-control-label">Customer Representative</label>
                                        <input type="text" id="cust_rep" name="cust_rep" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="please_note" class=" form-control-label">Warehouse Supervisor</label>
                                        <input type="text" id="warehouse_supervisor" name="warehouse_supervisor" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p>Product Details</p>
                            <div class="row all_product">
                                <div class="col-md-12 col-xs-12 product_main_div" id="product_main_div_1" data-no="1">
                                    <div class="form-group">
                                        <label for="product_name_1" class=" form-control-label">Product 1</label>
                                        <select id="product_name_1" name="product_name[]" class="form-control product_name" data-no="1">
                                            <option value="0">Select Product</option>
                                            @foreach($products as $p)
                                            <option value="{{$p->name}}" data-price="{{$p->price}}" data-app="{{$p->application}}">{{$p->name}}</option>
                                            @endforeach
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div id="other_prod_div_1" class="form-group other_prod_div">

                                    </div>
                                    <div class="form-group">
                                        <label for="unit_1" class=" form-control-label">Unit of Measurement</label>
                                        <select id="unit_1" name="unit[]" class="form-control" data-no="1">
                                            <option value="Gallon">Gallon</option>
                                            <option value="Pail">Pail</option>
                                            <option value="Tote">Tote</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_application_1" class=" form-control-label">Product Application</label>
                                        <input type="text" id="product_application_1" name="product_application[]" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="qty_1" class="form-control-label">Qty</label>
                                        <input type="text" id="qty_1" name="qty[]" class="form-control qty_txt" data-no="1">
                                    </div>
                                    <div class="form-group">
                                        <label for="price_1" class="form-control-label">Price Per Galon</label>
                                        <input type="text" id="price_1" name="price[]" class="form-control price_txt" data-no="1">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Total</label>
                                        <input type="text" id="total_1" name="total[]" class="form-control total" readonly="readonly">
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label class=" form-control-label">Select PDF template to upload in Google Drive</label>
                                </div>
                                <div>
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="checkbox1" class="form-check-label ">
                                                <input type="checkbox" id="checkbox1" name="customer_receipt" value="1" class="form-check-input">Customer Receipt
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox2" class="form-check-label ">
                                                <input type="checkbox" id="checkbox2" name="sales_order" value="1" class="form-check-input"> Sales Order
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="checkbox3" name="product_sample" value="1" class="form-check-input"> Product Sample
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-success" name="submit" style="float: right;">Submit</button>
                                <button type="button" class="btn btn-outline-primary add_product">Add Product</button>
                                <button type="button" class="btn btn-outline-danger cancle_product">Remove Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    var $ = jQuery;
    $(document).ready(function(){
        $("#date").datepicker('clearDates');
        $(".all_product").on('change', '.product_name', function(){
            var prod_val = $(this).val();
            var i = $(this).data("no");
            var price = $("option:selected", this).data("price");
            var application = $("option:selected", this).data("app");
            $("#product_application_"+i).val(application);
            $("#price_"+i).val(price);
            if(prod_val == 'other') {
                var sub_no = i - 1;
                $("#other_prod_div_"+i).html('<label for="other_prod_'+i+'" class=" form-control-label">Product Name</label> <input type="text" id="other_prod_'+i+'" name="other_prod['+sub_no+']" class="form-control">')
            } else {
                $("#other_prod_div_"+i).html(" ");
            }
        });
        $(".all_product").on("keypress, change, keyup", '.price_txt', function() {
            var  i = $(this).data("no");
            var price = $(this).val();
            var qty = $("#qty_"+i).val();
            var total = parseFloat(price)*parseInt(qty);
            $("#total_"+i).val(total);
        });
        $(".all_product").on("keypress, change, keyup", ".qty_txt", function() {
            var  i = $(this).data("no");
            var qty = $(this).val();
            var price = $("#price_"+i).val();
            var total = parseFloat(price)*parseInt(qty);
            $("#total_"+i).val(total);
        });
        $(".add_product").click(function(){
            var pro = $(".product_name", $(".product_main_div:last")).val();
            if(pro != 0) {
                var prod_no = $(".product_main_div:last").data("no");
                $.ajax({
                    url : '/product?prod_no='+prod_no,
                    type : 'get',
                    success : function (html) {
                        $(".all_product").append(html);
                        $(".all_product").replaceAll($(".all_product"));
                    }
                });
            }
        });
        $(".cancle_product").click(function() {
            var prod_no = $(".product_main_div:last").data("no");
            if(prod_no > 1) {
                $("#product_main_div_"+prod_no).remove();
            }
        });
        $("#salesForm").submit(function(){
            var error = false;
            $("input").each(function(){
                var val = $(this).val().trim();
                if(val == '' || val == null || val == undefined) {
                    error = true;
                }
            });
            if(error) {
                alert("All fields are required!!!");
                return false;
            }
        });

        $('input[type=radio][name=location_type]').change(function() {
            if (this.value === 'pickup') {
                $(".pickup_location_div").show();
            }
            else if (this.value === 'delivery') {
                $(".pickup_location_div").hide();
            }
        });
    });
</script>
@endsection