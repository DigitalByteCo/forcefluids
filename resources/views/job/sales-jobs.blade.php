<div class="card-header">
	<strong class="card-title">All Jobs</strong>
</div>
<div class="card-body">
	<div>
		<form action="{{route('job.index')}}" method="get" class="form-inline mb-2">
			<div class="form-group">
				<input type="text" name="q" class="form-control" placeholder="Customer Name">
			</div>
			<button type="submit" class="btn btn-outline-primary ml-3">Search</button>
		</form>
	</div>
	<div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Customer</th>
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
					<td>{{$j->customer->name}}</td>
					<td>{{$j->contact_name}}</td>
					<td>{{$j->date}}</td>
					<td>{{$j->start_time.' to '.$j->end_time }}</td>
					<td>{{$j->status}}</td>
					<td class="text-center">
						<a href="{{route('job.show', $j)}}" class="btn btn-sm btn-link"><i class="fa fa-eye"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>