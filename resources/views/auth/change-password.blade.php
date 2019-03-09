@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Change Password</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{route('home')}}">Dashboard</a></li>
                            <li class="active">Password</li>
                            <li class="active">Change</li>
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
                        <strong class="card-title">Create Company</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{route('post.change-pass')}}"  method="post">
                            @csrf
                            @if (session('error'))
                            <span class="text-danger">{{ session('error') }}</span>
                            @endif
                            @if (session('success'))
                            <span class="text-success">{{ session('success') }}</span>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control col-sm-6">
                            </div>
                            <div class="form-group">
                                <label class="control-label">New Password</label>
                                <input type="password" name="new_password" class="form-control col-sm-6">
                                @if ($errors->has('new_password'))
                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control col-sm-6">
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