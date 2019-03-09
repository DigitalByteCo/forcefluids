@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>All Customers</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{route('home')}}">Dashboard</a></li>
							<li><a href="{{route('customer.index')}}">Customer</a></li>
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
						<strong class="card-title">All Customers</strong>
						<a href="{{route('customer.create')}}" class="btn btn-outline-primary pull-right">Add New</a>
					</div>
					<div class="card-body">
						<div>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($customers as $c)
									<tr>
										<td>{{$c->id}}</td>
										<td>{{$c->name}}</td>
										<td>{{$c->email}}</td>
										<td>{{$c->status}}</td>
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