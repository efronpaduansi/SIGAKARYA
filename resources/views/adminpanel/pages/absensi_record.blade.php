@extends('layouts.adminpanel')

@section('title')
    Absensi Record
@endsection

@section('page-heading')
    Halaman Absensi Karyawan
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h3 class="text-center">Selamat datang, {{ Auth::user()->name }}</h3>
                    <p class="text-center">Silahkan tekan tombol dibawah ini untuk check-in atau check-out!</p>
                    <a href="#" class="btn btn-success text-center my-5" data-bs-toggle="modal" data-bs-target="#absensiModal"><i class="fas fa-clock"></i> Absen</a>
                    <br>
                    <strong class="text-center text-primary my-3">{{ $data['keterangan'] }}</strong>
                </div>
            </div>
        </div>
    </div>

{{--    Absensi Modal--}}
    <div class="modal fade" id="absensiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="absensiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="absensiModalLabel">Rekam Absensi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/absensi-karyawan') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ $data['recordId'] }}" name="recordId">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik_karyawan">Nama Karyawan <small class="text-danger">*</small></label>
                                    <select name="nik_karyawan" id="nik_karyawan" class="form-select choices" required>
                                        @foreach($data['karyawan'] as $karyawan)
                                            <option value="{{ $karyawan->nik }}">{{ $karyawan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_absensi">Jenis Absensi <small class="text-danger">*</small></label>
                                    <select name="jenis_absensi" id="jenis_absensi" class="form-select" required>
                                        <option value="masuk">Masuk</option>
                                        <option value="pulang">Pulang</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
