@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('flash_message_error'))
                
            @endif
            <div class="card">
                <div class="card-header">Verification OTP</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/post/verification') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="otp" class="col-md-4 col-form-label text-md-right">OTP</label>

                            <div class="col-md-6">
                                <input id="otp" type="otp" class="form-control @error('otp') is-invalid @enderror"
                                    name="otp" value="{{ old('otp') }}" required autocomplete="otp" autofocus>

                                @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Kirim
                                </button>
                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    style="margin-left:20px;">Resend OTP</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Resend OTP -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Resend OTP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/post/resend') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
