@extends('layouts.app')
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
					@if(auth()->user()->isCustomer() || auth()->user()->isAdmin())
					@include('job.customer-jobs', compact('jobs'))
					@endif
					@if(auth()->user()->isSales())
					@include('job.sales-jobs', compact('jobs'))
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection