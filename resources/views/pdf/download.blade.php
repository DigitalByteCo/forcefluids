@extends('layouts.app')

@section('content')
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Email Sales Order</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{route('home')}}">Dashboard</a></li>
							<li><a href="{{route('sales-order.index')}}">Sales Order</a></li>
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
					<div class="card-header">Send an Email</div>
					<div class="card-body">
						<form method="post" action="{{route('mail.pdf')}}">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="to_email" class=" form-control-label">To</label>
										<input type="text" id="to_email" name="to_email" class="form-control" required>
									</div>
									<input type="hidden" name="blank_ticket_template" value="{{$order->customer_receipt_file}}">
									<input type="hidden" name="blank_sale_order" value="{{$order->sales_order_file}}">
									<input type="hidden" name="product_sample_ticket" value="{{$order->product_sample_file}}">
									<button type="submit" class="btn btn-outline-success mb-1">Send</button>
								</div>
							</div>
							<div>
								<a href="{{asset('storage/pdf/'.$order->customer_receipt_file)}}" class="btn btn-primary pull-right mb-1 btn-sm mr-1" download>Ticket Template</a>
								<a href="{{asset('storage/pdf/'.$order->sales_order_file)}}" class="btn btn-primary pull-right mb-1 btn-sm mr-1" download>Sales Order</a>
								<a href="{{asset('storage/pdf/'.$order->product_sample_file)}}" class="btn btn-primary pull-right mb-1 btn-sm mr-1" download>Product Sample Ticket</a>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
