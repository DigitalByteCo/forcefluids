<div class="card-header">
	<strong class="card-title">All Jobs</strong>
	<a href="{{route('event.create')}}" class="btn btn-success pull-right ml-1">Add Event</a>
	<a href="{{route('job.create')}}" class="btn btn-outline-primary pull-right">Create Job</a>&nbsp;
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
						<a href="{{route('job.edit', $j)}}" class="btn btn-sm btn-link"><i class="fa fa-edit"></i></a>
						<a href="{{route('job.show', $j)}}" class="btn btn-sm btn-link"><i class="fa fa-eye"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>