@extends('layouts.adminpanel')

@section('title')
    Tambah Karyawan
@endsection

@section('page-heading')
    Form Tambah Karyawan
@endsection

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('karyawan.store') }}" method="POST" data-parsley-validate>
                        @csrf
                        @method('POST')
                        <div class="row mb-2">
                            <strong class="mb-2">Data Diri</strong>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addNIK">No. Induk Kependudukan <small
                                            class="text-danger">*</small></label>
                                    <input type="text" name="addNIK" id="addNIK" class="form-control"
                                        placeholder="Masukan No. Induk Kependudukan" autofocus required
                                        data-parsley-type="number" data-parsley-maxlength="20">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addNama">Nama Lengkap <small class="text-danger">*</small></label>
                                    <input type="text" name="addNama" id="addNama" class="form-control"
                                        placeholder="Masukan Nama Sesuai Identitas" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="addTempatLahir">Tempat Lahir <small class="text-danger">*</small></label>
                                <input type="text" name="addTempatLahir" id="addTempatLahir" class="form-control"
                                    placeholder="Masukan Tempat Lahir" required>
                            </div>

                            <div class="col-md-6">
                                <label for="addTanggalLahir">Tanggal Lahir <small class="text-danger">*</small></label>
                                <input type="date" name="addTanggalLahir" id="addTanggalLahir" class="form-control"
                                    value="{{ date('1990-01-01') }}" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addJK">Jenis Kelamin <small class="text-danger">*</small></label>
                                    <select name="addJK" id="addJK" class="form-select" required>
                                        <option disabled selected hidden>Pilih</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addAgama">Agama <small class="text-danger">*</small></label>
                                    <select name="addAgama" id="addAgama" class="form-select" required>
                                        <option disabled selected hidden>Pilih</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <strong class="mb-2">Informasi Kontak & Jabatan</strong>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addTelepon">No. Telepon <small class="text-danger">*</small></label>
                                    <input type="text" name="addTelepon" id="addTelepon" class="form-control"
                                        placeholder="Masukan No Telepon" required data-parsley-maxlength="15">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addRekening">No Rekening <small class="text-danger">*</small></label>
                                    <input type="text" name="addRekening" id="addRekening" class="form-control"
                                        placeholder="Masukan No Rekening" required data-parsley-maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addNamaRekening">Nama Pemilik Rekening <small
                                            class="text-danger">*</small></label>
                                    <input type="text" name="addNamaRekening" id="addNamaRekening" class="form-control"
                                        placeholder="Masukan Nama Pemilik Rekening" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addTahunMasuk">Tahun Masuk <small class="text-danger">*</small></label>
                                    <select name="addTahunMasuk" id="addTahunMasuk" class="form-select choices">
                                        @for ($tahun = date('Y'); $tahun >= 2000; $tahun--)
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addJabatan">Jabatan <small class="text-danger">*</small></label>
                                    <select name="addJabatan" id="addJabatan" class="form-select choices">
                                        @foreach ($data['jabatan'] as $jabatan)
                                            <option value="{{ $jabatan->kode }}">{{ $jabatan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addAlamat">Alamat Lengkap <small class="text-danger">*</small></label>
                                    <textarea name="addAlamat" id="addAlamat" class="form-control" cols="30" rows="2"
                                        placeholder="Masukan Alamat Lengkap" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex my-3">
                            <a href="{{ url('/karyawan') }}" class="btn btn-danger mx-2"><i class="fas fa-times"></i>
                                Batal</a>
                            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
