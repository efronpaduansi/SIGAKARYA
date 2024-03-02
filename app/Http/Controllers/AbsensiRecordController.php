<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;

class AbsensiRecordController extends Controller
{
    public function index()
    {
        $data['karyawan'] = Karyawan::latest('nama')->get();
        $data['record'] = Absensi::where('user_id', auth()->user()->id)
                        ->where('tanggal', date('Y-m-d'))
                        ->where('keterangan', 1)
                        ->latest()
                        ->first();

        if(!$data['record']){
            $data['keterangan'] = 'Anda belum melakukan rekam absensi!';
            $data['recordId'] = null;
        }else{
            $jamMasuk = $data['record']['created_at'];
            $data['keterangan'] = 'Anda telah melakukan check-in pada: ' . $jamMasuk;
            $data['recordId'] = $data['record']['id'];
        }

        return view('adminpanel.pages.absensi_record', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $data = [
            'nik_karyawan' => trim(htmlspecialchars($request->nik_karyawan)),
            'user_id' => trim(htmlspecialchars(intval($request->user_id))),
            'tanggal' => now(),
            'keterangan' => $request->keterangan,
        ];

        $saveData = Absensi::create($data);

        if(!$saveData){
            return back()->withToastError('Gagal merekam. Silahkan coba lagi!');
        }

        return back()->withToastSuccess('Berhasil merekam!');

    }
}
