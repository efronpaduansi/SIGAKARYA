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
                <button type="button" class="btn btn-primary mt-3 mb-4" data-bs-toggle="modal" data-bs-target="#timesheetModal"><i class="fas fa-plus"></i> Leave</button>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="mytable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Karyawan</th>
                                <th>Subjek</th>
                                <th>Jumlah Hari</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
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
                                        <a href="{{ route('timesheet.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
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
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Timesheet</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('timesheet.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik_karyawan">Nama Karyawan <small class="text-danger">*</small></label>
                                    <select name="nik_karyawan" id="nik_karyawn" class="form-select choices">
                                        @foreach ($data['karyawan'] as $karyawan)
                                            <option value="{{ $karyawan->nik }}">{{ $karyawan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subjek">Subjek <small class="text-danger">*</small></label>
                                    <select name="subjek" id="subjek" class="form-select choices" required>
                                        <option value="Pengajuan Cuti">Pengajuan Cuti</option>
                                        <option value="Lembur">Lembur</option>
                                        <option value="Dinas">Dinas</option>
                                        <option value="Tidak masuk karena sakit">Tidak masuk karena sakit</option>
                                        <option value="Masuk kerja terlambat">Masuk kerja terlambat</option>
                                        <option value="Pulang kerja lebih awal">Pulang kerja lebih awal</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis">Jenis <small class="text-danger">*</small></label>
                                    <select name="jenis" id="jenis" class="form-select choices">
                                        <option value="Leave">Leave</option>
                                        <option value="Terlambat kerja">Terlambat Kerja</option>
                                        <option value="Pulang Cepat">Pulang Cepat</option>
                                        <option value="Izin Khusus">Izin Khusus</option>
                                        <option value="Dinas">Dinas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlah_hari">Jumlah Hari <small class="text-danger">*</small></label>
                                    <input type="number" name="jumlah_hari" id="jumlah_hari" class="form-control" placeholder="Cth: 1" required>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dari_tgl">Dari Tanggal <small class="text-danger">*</small></label>
                                    <input type="date" name="dari_tgl" id="dari_tgl" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sampai_tgl">Sampai Tanggal <small class="text-danger">*</small></label>
                                    <input type="date" name="sampai_tgl" id="sampai_tgl" class="form-control" required>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan <small class="text-danger">*</small></label>
                                    <textarea name="keterangan" id="keterangan" cols="30" rows="2" class="form-control" placeholder="Masukan keterangan" required></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="file_lampiran">Lampiran <small>(Opsional)</small></label>
                                    <input type="file" name="file_lampiran" id="file_lampiran" class="form-control" accept=".pdf">
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
                            <button type="submit" class="btn btn-primary"><i class="fab fa-telegram-plane"></i> Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
