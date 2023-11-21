@extends('layouts.adminpanel')

@section('title')
    Edit Karyawan
@endsection

@section('page-heading')
    Form Edit Karyawan
@endsection

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('karyawan.update', $karyawan->nik) }}" method="POST" data-parsley-validate>
                        @csrf
                        @method('PUT')
                        <div class="row mb-2">
                            <strong class="mb-2">Data Diri</strong>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editNIK">No. Induk Kependudukan <small
                                            class="text-danger">*</small></label>
                                    <input type="text" name="editNIK" id="editNIK" class="form-control"
                                        placeholder="Masukan No. Induk Kependudukan" autofocus required
                                        data-parsley-type="number" data-parsley-maxlength="20" value="{{ $karyawan->nik }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editNama">Nama Lengkap <small class="text-danger">*</small></label>
                                    <input type="text" name="editNama" id="editNama" class="form-control"
                                        placeholder="Masukan Nama Sesuai Identitas" value="{{ $karyawan->nama }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="editTempatLahir">Tempat Lahir <small class="text-danger">*</small></label>
                                <input type="text" name="editTempatLahir" id="editTempatLahir" class="form-control"
                                    placeholder="Masukan Tempat Lahir" value="{{ $karyawan->tempat_lahir }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="editTanggalLahir">Tanggal Lahir <small class="text-danger">*</small></label>
                                <input type="date" name="editTanggalLahir" id="editTanggalLahir" class="form-control"
                                    value="{{ date('Y-m-d', strtotime($karyawan->tanggal_lahir)) }}" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editJK">Jenis Kelamin <small class="text-danger">*</small></label>
                                    <select name="editJK" id="editJK" class="form-select" required>
                                        <option disabled selected hidden>{{ $karyawan->jenis_kelamin }}</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editAgama">Agama <small class="text-danger">*</small></label>
                                    <select name="editAgama" id="editAgama" class="form-select" required>
                                        <option disabled selected hidden>{{ $karyawan->agama }}</option>
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="editTelepon">No. Telepon <small class="text-danger">*</small></label>
                                    <input type="text" name="editTelepon" id="editTelepon" class="form-control"
                                        placeholder="Masukan No Telepon" value="{{ $karyawan->telepon }}" required
                                        data-parsley-maxlength="15">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="editEmail">Email <small class="text-danger">*</small></label>
                                    <input type="email" name="editEmail" id="editEmail" class="form-control" value="{{ $karyawan->email }}" placeholder="Masukan Email Aktif" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="editRekening">No Rekening <small class="text-danger">*</small></label>
                                    <input type="text" name="editRekening" id="editRekening" class="form-control"
                                        placeholder="Masukan No Rekening" value="{{ $karyawan->rekening }}" required
                                        data-parsley-maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="editNamaRekening">Nama Pemilik Rekening <small
                                            class="text-danger">*</small></label>
                                    <input type="text" name="editNamaRekening" id="editNamaRekening"
                                        class="form-control" placeholder="Masukan Nama Pemilik Rekening"
                                        value="{{ $karyawan->nama_rekening }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="editTahunMasuk">Tahun Masuk <small class="text-danger">*</small></label>
                                    <select name="editTahunMasuk" id="editTahunMasuk" class="form-select choices">
                                        @for ($tahun = date('Y'); $tahun >= 2000; $tahun--)
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="editJabatan">Jabatan <small class="text-danger">*</small></label>
                                    <select name="editJabatan" id="editJabatan" class="form-select choices">
                                        </option>
                                        @foreach ($jabatan as $jabatan)
                                            <option value="{{ $jabatan->kode }}">{{ $jabatan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="editAlamat">Alamat Lengkap <small class="text-danger">*</small></label>
                                    <textarea name="editAlamat" id="editAlamat" class="form-control" cols="30" rows="2"
                                        placeholder="Masukan Alamat Lengkap" required>{{ $karyawan->alamat }}</textarea>
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
