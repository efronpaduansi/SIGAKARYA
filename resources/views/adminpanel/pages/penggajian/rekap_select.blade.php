@extends('layouts.adminpanel')

@section('title')
    Rekap Gaji
@endsection

@section('page-heading')
    Rekap Gaji
@endsection

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="justify-content-end">
                        {{-- <a href="{{ route('karyawan.exportPdf', $karyawan->nik) }}" class="btn btn-sm btn-secondary mb-3"
                            target="_blank"><i class="far fa-file-pdf"></i> Export
                            PDF</a> --}}
                    </div>
                </div>
                <div class="card-body">
                    {{-- <div class="table-responsive">
                        <p class="text-primary">Data Diri, informasi kontak dan jabatan.</p>
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th>No. Induk Kependudukan</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->nik }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->tempat_lahir . ', ' . date('d/m/Y', strtotime($karyawan->tanggal_lahir)) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th>Agama</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->agama }}</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->telepon }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->email }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Lengkap</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Pendidikan Terakhir</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->pendidikan_terakhir }}</td>
                                </tr>
                                <tr>
                                    <th>NPWP</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->npwp }}</td>
                                </tr>
                                <tr>
                                    <th>Status Pernikahan</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->status_pernikahan }}</td>
                                </tr>
                                <tr>
                                    <th>No. Rekening</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->rekening }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Pemilik Rekening</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->nama_rekening }}</td>
                                </tr>
                                <tr>
                                    <th>Jabatan saat ini</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->jabatan->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun Masuk</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->tahun_masuk }}</td>
                                </tr>
                                <tr>
                                    <th>Bergabung pada</th>
                                    <td>:</td>
                                    <td>{{ $karyawan->created_at->diffForHumans() }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('karyawan.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
