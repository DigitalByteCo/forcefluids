@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Send an Email</div>
				<div class="card-body">
					<div>
						<a href="{{asset('storage/pdf/'.$blank_ticket_template)}}" class="btn btn-primary pull-right mr-10" download>Ticket Template</a>
						<a href="{{asset('storage/pdf/'.$blank_sale_order)}}" class="btn btn-primary pull-right mr-10" download>Sales Order</a>
						<a href="{{asset('storage/pdf/'.$product_sample_ticket)}}" class="btn btn-primary pull-right mr-10" download>Product Sample Ticket</a>
					</div>
					<form method="post" action="{{route('mail.pdf')}}">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="to_email" class=" form-control-label">To</label>
									<input type="text" id="to_email" name="to_email" placeholder="To Email Address" class="form-control" required>
								</div>
								<input type="hidden" name="blank_ticket_template" value="{{$blank_ticket_template}}">
								<input type="hidden" name="blank_sale_order" value="{{$blank_sale_order}}">
								<input type="hidden" name="product_sample_ticket" value="{{$product_sample_ticket}}">
								<button type="submit" class="btn btn-outline-success">Send</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
