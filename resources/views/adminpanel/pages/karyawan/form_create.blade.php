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
                    <form action="{{ route('karyawan.store') }}" method="POST" data-parsley-validate enctype="multipart/form-data">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addJK">Jenis Kelamin <small class="text-danger">*</small></label>
                                    <select name="addJK" id="addJK" class="form-select" required>
                                        <option disabled selected hidden>Pilih</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
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

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addImage" class="form-label">Foto Profil <small class="text-danger">*</small></label>
                                    <input type="file" name="addImage" id="addImage" class="form-control" accept=".png, .jpeg, .jpg" required>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-2">
                            <strong class="mb-2">Informasi Kontak & Jabatan</strong>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="addTelepon">No. Telepon <small class="text-danger">*</small></label>
                                    <input type="text" name="addTelepon" id="addTelepon" class="form-control"
                                        placeholder="Masukan No Telepon" required data-parsley-maxlength="15">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="addEmail">Email <small class="text-danger">*</small></label>
                                    <input type="email" name="addEmail" id="addEmail" class="form-control" required placeholder="Masukan Email Aktif">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="addRekening">No Rekening <small class="text-danger">*</small></label>
                                    <input type="text" name="addRekening" id="addRekening" class="form-control"
                                        placeholder="Masukan No Rekening" required data-parsley-maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="addNamaRekening">Nama Pemilik Rekening <small
                                            class="text-danger">*</small></label>
                                    <input type="text" name="addNamaRekening" id="addNamaRekening" class="form-control"
                                        placeholder="Masukan Nama Pemilik Rekening" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addPendidikan">Pendidikan Terakhir <small class="text-danger">*</small></label>
                                    <select name="addPendidikan" id="addPendidikan" class="form-select choices">
                                        <option value="SD Sederajat">SD Sederajat</option>
                                        <option value="SMP Sederajat">SMP Sederajat</option>
                                        <option value="SMA Sederajat">SMA Sederajat</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addNPWP">NPWP <small class="text-danger">*</small></label>
                                    <input type="number" name="addNPWP" id="NPWP" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addStatusPernikahan">Status Perkawinan <small class="text-danger">*</small></label>
                                    <select name="addStatusPernikahan" id="addStatusPernikahan" class="form-select choices">
                                        <option value="Kawin">Kawin</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addTahunMasuk">Tahun Masuk <small class="text-danger">*</small></label>
                                    <input type="date" name="addTahunMasuk" id="addTahunMasuk" class="form-control">
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
