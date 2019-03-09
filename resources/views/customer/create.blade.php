@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Add Customer</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{route('home')}}">Dashboard</a></li>
							<li><a href="{{route('customer.index')}}">Customer</a></li>
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
					<div class="card-header">
						<strong class="card-title">Create Customer</strong>
					</div>
					<div class="card-body">
						<form action="{{route('customer.store')}}"  method="post">
							@csrf
							<div class="form-group">
								<label class="control-label">Company Name</label>
								<select name="company_id" class="form-control col-sm-6">
									@foreach($companies as $c)
									<option value="{{$c->id}}">{{$c->name}}</option>
									@endforeach
								</select>
								@if ($errors->has('company_id'))
								<span class="text-danger">{{ $errors->first('company_id') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label class="control-label">Name</label>
								<input type="text" name="name" class="form-control col-sm-6">
								@if ($errors->has('name'))
								<span class="text-danger">{{ $errors->first('name') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="text" name="email" class="form-control col-sm-6">
								@if ($errors->has('email'))
								<span class="text-danger">{{ $errors->first('email') }}</span>
								@endif
							</div>
							<div class="form-actions form-group">
								<button type="submit" class="btn btn-outline-success">Create</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection