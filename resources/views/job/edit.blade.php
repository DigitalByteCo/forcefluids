@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Job</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Job</a></li>
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
                        <strong class="card-title">Update Job</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{route('job.update', $job)}}"  method="post">
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label class="control-label">Company Name</label>
                                <select name="company_id" class="form-control">
                                    @foreach($companies as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('company_id'))
                                <span class="text-danger">{{ $errors->first('company_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Contact Name</label>
                                <input type="text" name="contact_name" class="form-control col-sm-6" value="{{$job->contact_name}}">
                                @if ($errors->has('contact_name'))
                                <span class="text-danger">{{ $errors->first('contact_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Contact Email</label>
                                <input type="text" name="contact_email" class="form-control col-sm-6" value="{{$job->contact_email}}">
                                @if ($errors->has('contact_email'))
                                <span class="text-danger">{{ $errors->first('contact_email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Contact Number</label>
                                <input type="text" name="contact_phone" class="form-control col-sm-6" value="{{$job->contact_phone}}">
                                @if ($errors->has('contact_phone'))
                                <span class="text-danger">{{ $errors->first('contact_phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Job Date</label>
                                <input type="text" name="date" class="form-control col-sm-6 date" value="{{date('m/d/Y', strtotime($job->date))}}">
                                @if ($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Start Time</label>
                                <input type="text" name="start_time" class="form-control col-sm-6 start_time" value="{{$job->start_time}}">
                                @if ($errors->has('start_time'))
                                <span class="text-danger">{{ $errors->first('start_time') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">End Time</label>
                                <input type="text" name="end_time" class="form-control col-sm-6 end_time" value="{{$job->end_time}}">
                                @if ($errors->has('end_time'))
                                <span class="text-danger">{{ $errors->first('end_time') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Well Name</label>
                                <input type="text" name="well_name" class="form-control col-sm-6" value="{{$job->well_name}}">
                                @if ($errors->has('well_name'))
                                <span class="text-danger">{{ $errors->first('well_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Operator</label>
                                <input type="text" name="operator" class="form-control col-sm-6" value="{{$job->operator}}">
                                @if ($errors->has('operator'))
                                <span class="text-danger">{{ $errors->first('operator') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">LSD#</label>
                                <input type="text" name="lsd" class="form-control col-sm-6" value="{{$job->lsd}}">
                                @if ($errors->has('lsd'))
                                <span class="text-danger">{{ $errors->first('lsd') }}</span>
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
@section('scripts')
<script type="text/javascript">
    var $ = jQuery;
    $(document).ready(function(){
        $('.date').datepicker();
        $('.start_time, .end_time').timepicker({
            showMeridian: false,
            explicitMode: true
        });
    });
</script>
@endsection
