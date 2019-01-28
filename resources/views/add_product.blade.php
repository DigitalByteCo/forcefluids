<div class="col-md-12 col-xs-12 product_main_div" id="product_main_div_{{$data['prod_no']}}" data-no="{{$data['prod_no']}}">
    <div class="form-group">
        <label for="product_name_{{$data['prod_no']}}" class=" form-control-label">Product {{$data['prod_no']}}</label>
        <select id="product_name_{{$data['prod_no']}}" name="product_name[]" class="form-control product_name" data-no="{{$data['prod_no']}}">
            <option value="0">Select Product</option>
            @foreach($products as $p)
            <option value="{{$p->name}}" data-price="{{$p->price}}" data-app="{{$p->application}}">{{$p->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="unit_{{$data['prod_no']}}" class=" form-control-label">Unit of Measurement</label>
        <select id="unit_{{$data['prod_no']}}" name="unit[]" class="form-control" data-no="{{$data['prod_no']}}">
            <option value="Gallon">Gallon</option>
            <option value="Pail">Pail</option>
            <option value="Tote">Tote</option>
        </select>
    </div>
    <div class="form-group">
        <label for="product_application_{{$data['prod_no']}}" class=" form-control-label">Product Application</label>
        <input type="text" id="product_application_{{$data['prod_no']}}" name="product_application[]" placeholder="Product Application" class="form-control">
    </div>
    <div class="form-group">
        <label for="qty_{{$data['prod_no']}}" class="form-control-label">Qty</label>
        <input type="text" id="qty_{{$data['prod_no']}}" name="qty[]" class="form-control qty_txt" data-no="{{$data['prod_no']}}">
    </div>
    <div class="form-group">
        <label for="price_{{$data['prod_no']}}" class="form-control-label">Price Per Galon</label>
        <input type="text" id="price_{{$data['prod_no']}}" name="price[]" class="form-control price_txt" data-no="{{$data['prod_no']}}">
    </div>
    <div class="form-group">
        <label class="form-control-label">Total</label>
        <input type="text" id="total_{{$data['prod_no']}}" name="total[]" class="form-control total" readonly="readonly">
    </div>
    <hr>
</div>