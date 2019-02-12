@extends('admin.layouts.app')
@section('content')
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Job</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="#">Dashboard</a></li>
							<li><a href="#">Job</a></li>
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
						<strong class="card-title">All Jobs</strong>
						<a href="{{route('admin.event.create')}}" class="btn btn-success pull-right ml-1">Add Event</a>
						<a href="{{route('admin.job.create')}}" class="btn btn-outline-primary pull-right">Create Job</a>&nbsp;
					</div>
					<div class="card-body">
						<div>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Company Name</th>
										<th>Contact Name</th>
										<th>Person Email</th>
										<th>Job Date</th>
										<th>Job Time</th>
										<th>Well Name</th>
										<th>Operator</th>
										<th>LSD</th>
										<th>Status</th>
										<th><i class="fa fa-gear"></i></th>
									</tr>
								</thead>
								<tbody>
									@foreach($jobs as $j)
									<tr>
										<td>{{$j->company->name}}</td>
										<td>{{$j->contact_name}}</td>
										<td>{{$j->contact_email}}</td>
										<td>{{$j->date}}</td>
										<td>{{$j->start_time.' to '.$j->end_time }}</td>
										<td>{{$j->well_name}}</td>
										<td>{{$j->operator}}</td>
										<td>{{$j->lsd}}</td>
										<td>{{$j->status}}</td>
										<td><a href="{{route('admin.job.edit', $j)}}" class="btn btn-sm btn-link"><i class="fa fa-edit"></i></a></td>
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