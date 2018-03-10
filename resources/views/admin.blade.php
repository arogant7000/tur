@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <a href="{{ route('admin.user-manage') }}">User Management</a> <br>
                    <a href="{{ route('admin.unverified') }}">User Unverified</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
