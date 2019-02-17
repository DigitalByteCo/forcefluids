<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/pdf-custom.css') }}" type="text/css" media="screen" rel="stylesheet">
</head>
<body id="job-report-body">
    <div class="container-fluid">
        <div class="row pdf_header_main">
            <div class="pdf_header_div">
                <img src="{{asset('images/yjos.jpg')}}" width="250px">
            </div>
            <div class="pdf_header_div pull-right">
                <div class="company_info pull-right">
                    <h3>Job Report</h3>
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <p style="display: block; clear: both; height: 20px; text-align: center; background-color: #ccc; margin-right: 20px;"><strong>COMPANY DETAILS</strong></p>
    <div style="clear: both;"></div>
    <div class="row" style="display: block;">
        <table>
            <tbody>
                <tr>
                    <td><label>Company :</label>&nbsp;<span>{{$job->customer->company->name}}</span></td>
                    <td><label>Contact :</label>&nbsp;<span>{{$job->customer->company->contact_person_name}}</span></td>
                </tr>
                <tr>
                    <td><label>Email :</label>&nbsp;<span>{{$job->customer->company->contact_person_email}}</span></td>
                    <td><label>Phone :</label>&nbsp;<span>{{$job->customer->company->contact_person_phone}}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="clear: both;"></div>
    <p style="display: block; clear: both; height: 20px; text-align: center; background-color: #ccc; margin-right: 20px;"><strong>JOB DETAILS</strong></p>
    <div style="clear: both;"></div>
    <div class="row" style="display: block;">
        <table>
            <tbody>
                <tr>
                    <td><label>Date :</label>&nbsp;<span>{{$job->date}}</span></td>
                    <td><label>Well Name :</label>&nbsp;<span>{{$job->well_name}}</span></td>
                </tr>
                <tr>
                    <td><label>Start Time :</label>&nbsp;<span>{{$job->start_time}}</span></td>
                    <td><label>Operator :</label>&nbsp;<span>{{$job->operator}}</span></td>
                </tr>
                <tr>
                    <td><label>End Time :</label>&nbsp;<span>{{$job->end_time}}</span></td>
                    <td><label>LSD# :</label>&nbsp;<span>{{$job->lsd}}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="clear: both;"></div>
    <p style="display: block; clear: both; height: 20px; text-align: center; background-color: #ccc; margin-right: 20px;">
        <strong>EVENT DETAILS</strong>
    </p>
    <div class="row" style="display: block;">
        <div class="table-responsive col-md-12">
            <table class="table table-bordered table-striped">
                <thead class="bg-color-blue color-white">
                    <tr>
                        <th>Time</th>
                        <th>Wellhead Pressure(PSI)</th>
                        <th>Circulation Pressure(PSI)</th>
                        <th>Discharge Rate(BPM)</th>
                        <th>Additive Type</th>
                        <th>Gallons</th>
                        <th>Discharge Total</th>
                        <th>Description Of Stage Or Event</th>
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
                        <td>{{$e->gallons}} Gallon(s)</td>
                        <td>{{$e->discharge_total}}</td>
                        <td>{{$e->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>