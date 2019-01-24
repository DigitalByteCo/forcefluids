@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
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
                                <label for="delivery_address" class=" form-control-label">Delivery Address</label>
                                <input type="text" id="delivery_address" name="delivery_address" placeholder="Delivery Address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="purchase_approved_by" class=" form-control-label">Purchase Approved By</label>
                                <input type="text" id="purchase_approved_by" name="purchase_approved_by" placeholder="Purchase Approved By" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="please_note" class=" form-control-label">Please Note</label>
                                <input type="text" id="please_note" name="please_note" placeholder="Please Note" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Product Details</p>
                            <div class="form-group">
                                <label for="product_name[]" class=" form-control-label">Product</label>
                                <select id="product_name_1" name="product_name[]" class="form-control" data-no="1">
                                    <option value="Product 1">Product 1</option>
                                    <option value="Product 2">Product 2</option>
                                    <option value="Product 3">Product 3</option>
                                    <option value="Product 4">Product 4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="unit[]" class=" form-control-label">Unit of Measurement</label>
                                <select id="unit_1" name="unit[]" class="form-control" data-no="1">
                                    <option value="Pail">Pail</option>
                                    <option value="Tote">Tote</option>
                                    <option value="Gallon">Gallon</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_application" class=" form-control-label">Product Application</label>
                                <input type="text" id="product_application" name="product_application[]" placeholder="Product Application" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
