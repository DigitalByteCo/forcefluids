@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Manage Job Revenue</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{route('home')}}">Dashboard</a></li>
							<li><a href="{{route('job.index')}}">Job</a></li>
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
						<strong class="card-title">All Closed Jobs</strong>
					</div>
					<div class="card-body">
						<div>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Contact Name</th>
										<th>Job Date</th>
										<th>Job Time</th>
										<th>Status</th>
										<th class="text-center"><i class="fa fa-gear"></i></th>
									</tr>
								</thead>
								<tbody>
									@foreach($jobs as $j)
									<tr>
										<td>{{$j->contact_name}}</td>
										<td>{{$j->date}}</td>
										<td>{{$j->start_time.' to '.$j->end_time }}</td>
										<td>{{$j->status}}</td>
										<td class="text-center">
											<a href="{{route('job.revenue.create', $j)}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
										</td>
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