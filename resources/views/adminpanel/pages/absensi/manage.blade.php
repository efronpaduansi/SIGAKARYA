@extends('layouts.adminpanel')

@section('title')
    Absensi Karyawan
@endsection

@section('page-heading')
    Rekap Absensi Karyawan
@endsection

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="" method="GET">
                        <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="startDate">Dari Tanggal</label>
                                        <input type="date" name="startDate" id="startDate" class="form-control" value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="endDate">Sampai Tanggal</label>
                                        <input type="date" name="endDate" id="endDate" class="form-control" value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary mt-4"><i class="fas fa-search"></i> Filter</button>
                                </div>
                        </div>
                </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="mytable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Karyawan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($data['absensiRecords'] as $item)
                                 <tr>
                                     <td>{{ $loop->iteration }}</td>
                                     <td>{{ $item->karyawan->nama }}</td>
                                     <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                     <td>{{ date('H:i:s', strtotime($item->created_at)) }}</td>
                                     <td>{{ $item->keterangan == 1 ? 'Hadir' : 'Tidak Hadir' }}</td>
                                     <td>
                                         <form action="{{ route('absensi.destroy', $item->id) }}" method="POST">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')"><i class="fas fa-times"></i></button>
                                         </form>
                                     </td>
                                 </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('adminpanel.pages.jabatan.create_modal');
    </section>
@endsection
