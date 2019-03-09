@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Job</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{route('home')}}">Dashboard</a></li>
                            <li><a href="{{route('job.index')}}">Job</a></li>
                            <li class="active">View</li>
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
                        <strong class="card-title">Job Details</strong>
                        <a href="{{route('job.pdf', $job)}}" class="btn btn-outline-danger pull-right" target="_blank"><i class="fa fa-file-pdf-o"></i>&nbsp;Export As PDF</a>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Start - End Time</th>
                                        <th>Well Name</th>
                                        <th>Operator</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$job->date}}</td>
                                        <td>{{$job->start_time." - ". $job->end_time}}</td>
                                        <td>{{$job->well_name}}</td>
                                        <td>{{$job->operator}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <p><strong>Event Details</strong></p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Event Time</th>
                                        <th>Wellhead Pressure</th>
                                        <th>Circulation Pressure</th>
                                        <th>Discharge Rate</th>
                                        <th>Additive Type</th>
                                        <th>Discharge Total</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($job->events as $e)
                                    <tr>
                                        <td>{{$e->time}}</td>
                                        <td>{{$e->wellhead_pressure}}</td>
                                        <td>{{$e->circulation_pressure}}</td>
                                        <td>{{$e->discharge_rate}}</td>
                                        <td>{{$e->additive->name}}</td>
                                        <td>{{$e->description}}</td>
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
