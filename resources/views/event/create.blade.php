@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Event</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Event</a></li>
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
                        <strong class="card-title">Create Event</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{route('event.store')}}"  method="post" id="eventForm">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Select Job</label>
                                <select name="job_id" class="form-control">
                                    @foreach($jobs as $j)
                                    <option value="{{$j->id}}">{{$j->well_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('job_id'))
                                <span class="text-danger">{{ $errors->first('job_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Event Time</label>
                                <input type="text" name="time" class="form-control col-sm-6 time">
                                @if ($errors->has('time'))
                                <span class="text-danger">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Well Head Pressure</label>
                                <input type="text" name="wellhead_pressure" class="form-control col-sm-6">
                                @if ($errors->has('wellhead_pressure'))
                                <span class="text-danger">{{ $errors->first('wellhead_pressure') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Circulation Pressure</label>
                                <input type="text" name="circulation_pressure" class="form-control col-sm-6">
                                @if ($errors->has('circulation_pressure'))
                                <span class="text-danger">{{ $errors->first('circulation_pressure') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Discharge Rate</label>
                                <input type="text" name="discharge_rate" class="form-control col-sm-6">
                                @if ($errors->has('discharge_rate'))
                                <span class="text-danger">{{ $errors->first('discharge_rate') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Additive Amount</label>
                                <input type="text" name="additive_amount" class="form-control col-sm-6">
                                @if ($errors->has('additive_amount'))
                                <span class="text-danger">{{ $errors->first('additive_amount') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Discharge Total</label>
                                <input type="text" name="discharge_total" class="form-control col-sm-6">
                                @if ($errors->has('discharge_total'))
                                <span class="text-danger">{{ $errors->first('discharge_total') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea name="description" class="form-control col-sm-6"></textarea>
                                @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" name="submit" class="btn btn-outline-success" value="save">Save</button>
                                <button type="submit" name="submit" class="btn btn-outline-success" value="save_close">Save & Close</button>
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
<script>
    var $ = jQuery;
    $(document).ready(function(){
        $('.time').timepicker({
            showMeridian: false,
            explicitMode: true
        });
    });
</script>
@endsection