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
            <div class="card">
                <div class="card-header bg-danger text-white mb-5">
                    Halaman Konfirmasi Pinjaman
                </div>
                <div class="card-body">
                    <form action="{{ route('pinjaman.updateJumlahAngsuran', $data->no_pinjaman) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>No. Pinjaman</th>
                                <td>{{ $data->no_pinjaman }}</td>
                            </tr>
                            <tr>
                                <th>Nama Peminjam</th>
                                <td>{{ $data->karyawan->nama }}</td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td>{{ $data->jabatan->nama }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Ajuan Pinjaman</th>
                                <td>{{ $data->tanggal_pinjam }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Pinjaman</th>
                                <td><strong>{{ 'Rp. ' . number_format($data->jumlah, 0, '.', '.') }}</strong></td>
                            </tr>
                            <tr>
                                <th>Jangka Waktu</th>
                                <td><strong>{{ $data->jangka_waktu . ' bulan' }}</strong></td>
                            </tr>
                            <tr>
                                <th>Angsuran per bulan</th>
                                <td>
                                    <input type="text" class="form-control rupiah " name="angsuran" id="angsuran"
                                        value="{{ $angsuran }}" readonly>
                                </td>
                            </tr>
                        </table>

                        <div class="card-footer">
                            <a href="{{ route('pinjaman.create') }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary">Ajukan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
