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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="mytable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Karyawan</th>
                                <th>Gaji Awal</th>
                                <th>Tunjangan Jabatan</th>
                                <th>Tunjangan Lainnya</th>
                                <th>Potongan BPJS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->karyawan->nama }}</td>
                                <td>{{ $data->gaji_awal }}</td>
                                <td>{{ $data->tunjangan_jabatan }}</td>
                                <td>{{ $data->total_tunjangan }}</td>
                                <td>{{ $data->potongan_bpjs }}</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection