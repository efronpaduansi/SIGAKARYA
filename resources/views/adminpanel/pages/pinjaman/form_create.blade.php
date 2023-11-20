@extends('layouts.adminpanel')

@section('title')
    Pinjaman Karyawan
@endsection

@section('page-heading')
    Tambah Data Pinjaman
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card p-3 shadow">
                <form action="{{ route('pinjaman.store') }}" method="POST" data-parsley-validate>
                    @csrf
                    @method('POST')

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addNo">Nomor Pinjaman</label>
                                <input type="text" name="addNo" id="addNo" class="form-control"
                                    value="{{ $data['number'] }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addNIK">Karyawan <small class="text-danger">*</small></label>
                                <select name="addNIK" id="addNIK" class="form-select choices" required>
                                    @foreach ($data['karyawan'] as $karyawan)
                                        <option value="{{ $karyawan->nik }}">{{ $karyawan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="addTanggal">Tanggal <small class="text-danger">*</small></label>
                                <input type="date" name="addTanggal" id="addTanggal" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="addJumlah">Jumlah Pinjaman <small class="text-danger">*</small></label>
                                <input type="text" name="addJumlah" id="addJumlah" class="form-control rupiah" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="addJangkaWaktu">Jangka Waktu <small class="text-danger">*</small></label>
                                <select name="addJangkaWaktu" id="addJangkaWaktu" class="form-select" required>
                                    <option value="1">1 bulan</option>
                                    <option value="2">2 bulan</option>
                                    <option value="3">3 bulan</option>
                                    <option value="4">4 bulan</option>
                                    <option value="5">5 bulan</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <a href="{{ route('pinjaman.index') }}" class="btn btn-danger"><i class="fas fa-times"></i>
                            Batal</a>
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan dan
                            lanjutkan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
