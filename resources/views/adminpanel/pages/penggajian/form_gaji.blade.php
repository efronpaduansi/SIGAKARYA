@extends('layouts.adminpanel')

@section('title')
    Input Gaji Karyawan
@endsection

@section('page-heading')
    Input Gaji Karyawan
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('penggajian.store') }}" method="POST" data-parsley-validate>
                        @csrf
                        <strong>Detail Karyawan</strong>
                        <div class="row mt-2">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bulan">Bulan</label>
                                    <input type="text" name="bulan" id="bulan" class="form-control" value="{{ $bulan }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nik_karyawan">NIK</label>
                                    <input type="text" name="nik_karyawan" id="nik_karyawan" class="form-control" value="{{ $karyawan->nik }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nama_karyawan">Nama Karyawan</label>
                                    <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" value="{{ $karyawan->nama }}" readonly>
                                </div>
                            </div>

                           <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $karyawan->jabatan->nama }}" readonly>
                                </div>
                           </div>

                        </div>

                        <strong>Informasi Gaji</strong>
                        <div class="row mt-2">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gaji_awal">Gaji Awal <small class="text-danger">*</small></label>
                                    <input type="number" name="gaji_awal" id="gaji_awal" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tunjangan_jabatan">Tunjangan Jabatan <small class="text-danger">*</small></label>
                                    <input type="number" name="tunjangan_jabatan" id="tunjangan_jabatan" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tunjangan_makan">Tunjangan Makan <small class="text-danger">*</small></label>
                                    <input type="number" name="tunjangan_makan" id="tunjangan_makan" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tunjangan_transport">Tunjangan Transport <small class="text-danger">*</small></label>
                                    <input type="number" name="tunjangan_transport" id="tunjangan_transport" class="form-control" required>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tunjangan_bpjs">Tunjangan BPJS <small class="text-danger"></small></label>
                                    <input type="number" name="tunjangan_bpjs" id="tunjangan_bpjs" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="potongan_bpjs">Potongan BPJS <small class="text-danger"></small></label>
                                    <input type="number" name="potongan_bpjs" id="potongan_bpjs" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pph">PPH <small class="text-danger">*</small></label>
                                    <input type="number" name="pph" id="pph" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pph_per_thn">PPH per Tahun <small class="text-danger">*</small></label>
                                    <input type="number" name="pph_per_thn" id="pph_per_thn" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pph_per_bln">PPH per Bulan <small class="text-danger">*</small></label>
                                    <input type="number" name="pph_per_bln" id="pph_per_bln" class="form-control" required>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection