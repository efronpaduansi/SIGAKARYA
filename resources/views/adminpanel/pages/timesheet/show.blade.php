@extends('layouts.adminpanel')

@section('title')
    Timesheet
@endsection

@section('page-heading')
    Timesheet
@endsection

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('timesheet.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Nama Karyawan</th>
                            <td>:</td>
                            <td>{{ $data->karyawan->nama }}</td>
                        </tr>
                        <tr>
                            <th>Subjek</th>
                            <td>:</td>
                            <td>{{ $data->subjek }}</td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td>:</td>
                            <td>{{ $data->jenis }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Hari</th>
                            <td>:</td>
                            <td>{{ $data->jumlah_hari . " hari" }}</td>
                        </tr>
                        <tr>
                            <th>Dari Tanggal</th>
                            <td>:</td>
                            <td>{{ date('d/m/Y', strtotime($data->dari_tgl)) }}</td>
                        </tr>
                        <tr>
                            <th>Sampai Tanggal</th>
                            <td>:</td>
                            <td>{{ date('d/m/Y', strtotime($data->sampai_tgl)) }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>:</td>
                            <td>{{ $data->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>
                                {{ $data->status }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                     <form action="" >
                        <button type="submit" class="btn btn-danger me-2">Tolak</button>
                     </form>

                     <form action="" >
                        <button type="submit" class="btn btn-success">Setujui</button>
                     </form>

                </div>
            </div>
        </div>
    </div>
@endsection