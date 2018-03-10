@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nama_travel" class="col-md-4 col-form-label text-md-right">Nama travel</label>

                            <div class="col-md-6">
                                <input id="nama_travel" type="text" class="form-control{{ $errors->has('nama_travel') ? ' is-invalid' : '' }}" name="nama_travel" value="{{ old('nama_travel') }}" required autofocus>

                                @if ($errors->has('nama_travel'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama_travel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_pemilik" class="col-md-4 col-form-label text-md-right">Nama Pemilik</label>

                            <div class="col-md-6">
                                <input id="nama_pemilik" type="text" class="form-control{{ $errors->has('nama_pemilik') ? ' is-invalid' : '' }}" name="nama_pemilik" value="{{ old('nama_pemilik') }}" required autofocus>

                                @if ($errors->has('nama_pemilik'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama_pemilik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telp" class="col-md-4 col-form-label text-md-right">Telepon</label>

                            <div class="col-md-6">
                                <input id="telp" type="text" class="form-control{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" value="{{ old('telp') }}" required autofocus>

                                @if ($errors->has('telp'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="provinsi" class="col-md-4 col-form-label text-md-right">Provinsi</label>

                            <div class="col-md-6">
                                <input id="provinsi" type="text" class="form-control{{ $errors->has('provinsi') ? ' is-invalid' : '' }}" name="provinsi" value="{{ old('provinsi') }}" required autofocus>

                                @if ($errors->has('provinsi'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('provinsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kabupaten" class="col-md-4 col-form-label text-md-right">Kabupaten</label>

                            <div class="col-md-6">
                                <input id="kabupaten" type="text" class="form-control{{ $errors->has('kabupaten') ? ' is-invalid' : '' }}" name="kabupaten" value="{{ old('kabupaten') }}" required autofocus>

                                @if ($errors->has('kabupaten'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('kabupaten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" required autofocus>

                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
