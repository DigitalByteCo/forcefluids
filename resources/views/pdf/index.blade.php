@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Sales Order List</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{route('home')}}">Dashboard</a></li>
							<li><a href="#">Sales Order</a></li>
							<li class="active">List</li>
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
						<strong class="card-title">All Sales Orders</strong>
						<a href="{{route('sales-order.create')}}" class="btn btn-outline-primary pull-right">Add New</a>
					</div>
					<div class="card-body">
						<div>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Date</th>
										<th>Company Name</th>
										<th>Location Type</th>
										<th>Sales Representative</th>
										<th>Purchased Approved By</th>
										<th class="text-center"><i class="fa fa-gear"></i></th>
									</tr>
								</thead>
								<tbody>
									@foreach($orders as $o)
									<tr>
										<td>{{$o->id}}</td>
										<td>{{$o->date}}</td>
										<td>{{$o->company->name}}</td>
										<td>{{$o->location_type}}</td>
										<td>{{$o->force_team_sales_rep}}</td>
										<td>{{$o->purchase_approved_by}}</td>
										<td>
											<a href="{{route('sales-order.show', $o)}}" class="btn btn-sm btn-link"><i class="fa fa-eye"></i></a>
											<a href="{{route('sales-order.download', $o)}}" class="btn btn-sm btn-link"><i class="fa fa-paper-plane"></i></a></td>
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