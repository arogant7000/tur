@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header text-center">Unverified User</div>

                <div class="card-body">

                    <table class="table table-striped table-bordered">
                        <tr class="text-center">
                                <th>Nama Travel</th>
                                <th>Pemilik Travel</th>
                                <th>Email</th>
                                <th>Document</th>
                                <th colspan="2">Action</th>
                        </tr>

                        @foreach($user as $value)
                        <tr class="text-center">
                            <td>{{ $value->nama_travel }}</td>
                            <td> {{$value->nama_pemilik}} </td>    
                            <td> {{$value->email}}  </td>
                            <td>
                                <button class="btn btn-primary">View Document</button>
                            </td>
                            <td>
                                    <form class="" action="" method="post">
                                            <input type="hidden" name="_method" value="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-success">
                                                <a href="{{ url('admin/unverified/updatestatus/'.$value->id_agent) }} " onclick="return confirm('Verified this user?');">Verify</a>
                                            </button>
                                    </form>
                            <td>
                                <button class="btn btn-danger">Reject</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
