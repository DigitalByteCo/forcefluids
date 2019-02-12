@extends('admin.layouts.app')
@section('content')
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Edit Company</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="#">Dashboard</a></li>
							<li><a href="#">Company</a></li>
							<li class="active">Edit</li>
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
						<strong class="card-title">Update Company</strong>
					</div>
					<div class="card-body">
						<form action="{{route('admin.company.update', $company)}}"  method="post">
							@csrf
							<input type="hidden" name="_method" value="put">
							<div class="form-group">
								<label class="control-label">Company Name</label>
								<input type="text" name="name" class="form-control col-sm-6" value="{{$company->name}}">
								@if ($errors->has('name'))
								<span class="text-danger">{{ $errors->first('name') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label class="control-label">Contact Person Name</label>
								<input type="text" name="contact_person_name" class="form-control col-sm-6" value="{{$company->contact_person_name}}">
								@if ($errors->has('contact_person_name'))
								<span class="text-danger">{{ $errors->first('contact_person_name') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label class="control-label">Contact Person Email</label>
								<input type="text" name="contact_person_email" class="form-control col-sm-6" value="{{$company->contact_person_email}}">
								@if ($errors->has('contact_person_email'))
								<span class="text-danger">{{ $errors->first('contact_person_email') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label class="control-label">Contact Person Number</label>
								<input type="text" name="contact_person_phone" class="form-control col-sm-6" value="{{$company->contact_person_phone}}">
								@if ($errors->has('contact_person_phone'))
								<span class="text-danger">{{ $errors->first('contact_person_phone') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label class="control-label">Primary Address</label>
								<input type="text" name="address_1" class="form-control col-sm-6" value="{{$company->address_1}}">
								@if ($errors->has('address_1'))
								<span class="text-danger">{{ $errors->first('address_1') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label class="control-label">Street</label>
								<input type="text" name="street" class="form-control col-sm-6" value="{{$company->street}}">
								@if ($errors->has('street'))
								<span class="text-danger">{{ $errors->first('street') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label class="control-label">City</label>
								<input type="text" name="city" class="form-control col-sm-6" value="{{$company->city}}">
								@if ($errors->has('city'))
								<span class="text-danger">{{ $errors->first('city') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label class="control-label">State</label>
								<input type="text" name="state" class="form-control col-sm-6" value="{{$company->state}}">
								@if ($errors->has('state'))
								<span class="text-danger">{{ $errors->first('state') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label class="control-label">Zip Code</label>
								<input type="text" name="zipcode" class="form-control col-sm-6" value="{{$company->zipcode}}">
								@if ($errors->has('zipcode'))
								<span class="text-danger">{{ $errors->first('zipcode') }}</span>
								@endif
							</div>
							<div class="form-actions form-group">
								<button type="submit" class="btn btn-outline-success">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection