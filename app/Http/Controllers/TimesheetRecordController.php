<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use Alert;

class TimesheetRecordController extends Controller
{
    public function index()
    {
        $data['karyawan'] = Karyawan::query()->oldest('nama')->get();
        $data['timesheets'] = Timesheet::latest()->get();

        return view('adminpanel.pages.timesheet.timesheet', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $data = [
            'nik_karyawan'  => $request->nik_karyawan,
            'subjek'        => $request->subjek,
            'jenis'         => $request->jenis,
            'jumlah_hari'   => trim(htmlspecialchars($request->jumlah_hari)),
            'dari_tgl'      => $request->dari_tgl,
            'sampai_tgl'    => $request->sampai_tgl,
            'keterangan'    => $request->keterangan,
        ];

        //cek apakah ada file yang dikirimkan, jika ada simpan file tersebut
        if( $request->hasFile('file_lampiran') ){
            $filename = $request->file('file_lampiran')->getClientOriginalName();
            $extension = $request->file('file_lampiran')->getClientOriginalExtension();
            $filename = $filename .'.'. $extension;
            $request->file('file_lampiran')->move('uploads', $filename);
            $data['file_lampiran'] = $filename;
        }

        $saveData = Timesheet::create($data);

        if(!$saveData){
            return back()->withToastError('Simpan gagal!');
        }

        return back()->withToastSuccess('Simpan berhasil');

    }

    public function show($id)
    {
        $data = Timesheet::find($id);
        return view('adminpanel.pages.timesheet.show', ['data'=> $data]);
    }

    // public function downloadUploadedFiles($filename)
    // {
    //     $filePath = public_path('uploads/' . $fileName);

    //     return Response::download($filePath);
    // }

    public function doAccepted($id)
    {
        $data = Timesheet::find($id);

        if($data->status == 'Menunggu Konfirmasi'){
            $status = 'Disetujui';

            $updateStatus = Timesheet::where('id', $id)->update(array('status' => $status));

            return back()->withToastSuccess('Timesheet berhasil diupdate!');

        }
    }

    public function doRejected($id)
    {
        $data = Timesheet::find($id);
        if($data->status == 'Menunggu Konfirmasi'){
            $status = 'Ditolak';
            $updateStatus =  Timesheet::where('id', $id)->update(array('status'=> $status));

            return back()->withToastSuccess('Timesheet ditolak!');

        }
    }

}
