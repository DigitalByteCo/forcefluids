@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Create New Job</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{route('home')}}">Dashboard</a></li>
                            <li><a href="{{route('job.index')}}">Job</a></li>
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
                        <strong class="card-title">Create Job</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{route('job.revenue.store', $job)}}"  method="post">
                            @csrf
                            <p>Gel Additive</p>
                            <div class="form-group">
                                <label>Purchase Cost</label>
                                <input type="text" name="gel_purchase_cost" class="form-control col-sm-6" value="{{!empty($gel) ? $gel->purchase_cost : ''}}">
                                @if ($errors->has('gel_purchase_cost'))
                                <span class="text-danger">{{ $errors->first('gel_purchase_cost') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Selling Cost</label>
                                <input type="text" name="gel_selling_cost" class="form-control col-sm-6" value="{{!empty($gel) ? $gel->selling_cost : ''}}">
                                @if ($errors->has('gel_selling_cost'))
                                <span class="text-danger">{{ $errors->first('gel_selling_cost') }}</span>
                                @endif
                            </div>
                            <hr>
                            <p>Friction Reducer Additive</p>
                            <div class="form-group">
                                <label>Purchase Cost</label>
                                <input type="text" name="friction_purchase_cost" class="form-control col-sm-6" value="{{!empty($friction) ? $friction->purchase_cost : ''}}">
                                @if ($errors->has('friction_purchase_cost'))
                                <span class="text-danger">{{ $errors->first('friction_purchase_cost') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Selling Cost</label>
                                <input type="text" name="friction_selling_cost" class="form-control col-sm-6" value="{{!empty($friction) ? $friction->selling_cost : ''}}">
                                @if ($errors->has('friction_selling_cost'))
                                <span class="text-danger">{{ $errors->first('friction_selling_cost') }}</span>
                                @endif
                            </div>
                            <hr>
                            <p>Pipe On Pipe Additive</p>
                            <div class="form-group">
                                <label>Purchase Cost</label>
                                <input type="text" name="pop_purchase_cost" class="form-control col-sm-6" value="{{!empty($pop) ? $pop->purchase_cost : ''}}">
                                @if ($errors->has('pop_purchase_cost'))
                                <span class="text-danger">{{ $errors->first('pop_purchase_cost') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Selling Cost</label>
                                <input type="text" name="pop_selling_cost" class="form-control col-sm-6" value="{{!empty($pop) ? $pop->selling_cost : ''}}">
                                @if ($errors->has('pop_selling_cost'))
                                <span class="text-danger">{{ $errors->first('pop_selling_cost') }}</span>
                                @endif
                            </div>
                            <hr>
                            <p>Misc. Additive</p>
                            <div class="form-group">
                                <label>Purchase Cost</label>
                                <input type="text" name="misc_purchase_cost" class="form-control col-sm-6" value="{{!empty($misc) ? $misc->purchase_cost : ''}}">
                                @if ($errors->has('misc_purchase_cost'))
                                <span class="text-danger">{{ $errors->first('misc_purchase_cost') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Selling Cost</label>
                                <input type="text" name="misc_selling_cost" class="form-control col-sm-6" value="{{!empty($misc) ? $misc->selling_cost : ''}}">
                                @if ($errors->has('misc_selling_cost'))
                                <span class="text-danger">{{ $errors->first('misc_selling_cost') }}</span>
                                @endif
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-outline-success">Save</button>
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
        $('.date').datepicker('cleardates');
        $('.start_time, .end_time').timepicker({
            showMeridian: false,
            explicitMode: true
        });
    });
</script>
@endsection