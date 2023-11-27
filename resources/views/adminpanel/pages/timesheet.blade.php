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
            <div class="card-body">
                <button type="button" class="btn btn-primary mt-3 mb-4" data-bs-toggle="modal" data-bs-target="#timesheetModal">Leave</button>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="mytable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Karyawan</th>
                                <th>Subjek</th>
                                <th>Jumlah Hari</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['timesheets'] as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->karyawan->nama }}</td>
                                    <td>{{ $item->subjek }}</td>
                                    <td>{{ $item->jumlah_hari }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{--    Timesheet modal--}}
    <div class="modal fade" id="timesheetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


@endsection
