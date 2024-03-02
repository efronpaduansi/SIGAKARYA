@extends('layouts.adminpanel')

@section('title')
    Input Gaji Karyawan
@endsection

@section('page-heading')
    Input Gaji Karyawan
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('penggajian.formGaji') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik_karyawan">Pilih Karyawan <small class="text-danger">*</small></label>
                                    <select name="nik_karyawan" id="nik_karyawan" class="form-select choices" required>
                                        @foreach ($data['karyawans'] as $kry)
                                            <option value="{{ $kry->nik }}">{{ $kry->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bulan">Bulan <small class="text-danger">*</small></label>
                                    <select name="bulan" id="bulan" class="form-select choices" required>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
