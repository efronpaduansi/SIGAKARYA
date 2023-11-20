@extends('layouts.authentication')

@section('content')
    <div class=" no-pdding login-box">
        <div class="row no-margin w-100 bklmj">
            <div class="col-lg-6 col-md-6 log-det">

                <h2>Login</h2>


                <div class="row no-margin past">
                    <p>Silahkan login untuk melanjutkan </p>
                </div>

                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <div class="text-box-cont">
                        <div class="input-group mb-3">

                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email"
                                aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">

                            <input type="password" name="password" class="form-control" placeholder="Password"
                                aria-label="Password" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="right-bkij mb-5">
                            <button type="submit" class="btn btn-success btn-round">Login</button>
                        </div>
                        <br> <br>
                    </div>
                </form>


            </div>
            <div class="col-lg-6 col-md-6 box-de">
                <div class="ditk-inf">
                    <h2 class="w-100">Selamat Datang </h2>
                    <p>Mudahkan semua proses penggajian di perusahaan Anda dengan SIGAKARYA</p>
                    {{-- <button type="button" class="btn btn-outline-light"></button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
