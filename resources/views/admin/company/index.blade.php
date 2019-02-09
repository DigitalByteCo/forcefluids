@extends('admin.layouts.app')
@section('content')
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Dashboard</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="#">Dashboard</a></li>
							<li><a href="#">Company</a></li>
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
						<strong class="card-title">All Companies</strong>
						<a href="{{route('admin.company.create')}}" class="btn btn-outline-primary pull-right">Add New</a>
					</div>
					<div class="card-body">
						<div>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Company Name</th>
										<th>Contact Person</th>
										<th>Person Email</th>
										<th>Person Phone No.</th>
										<th>Address</th>
										<th><i class="fa fa-gear"></i></th>
									</tr>
								</thead>
								<tbody>
									@foreach($companies as $c)
									<tr>
										<td>{{$c->name}}</td>
										<td>{{$c->contact_person_name}}</td>
										<td>{{$c->contact_person_email}}</td>
										<td>{{$c->contact_person_phone}}</td>
										<td>{{$c->address}}</td>
										<td><a href="{{route('admin.company.edit', $c)}}" class="btn btn-sm btn-link"><i class="fa fa-edit"></i></a></td>
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