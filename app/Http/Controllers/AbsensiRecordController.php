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

        return view('adminpanel.pages.absensi_record', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $data = [
            'nik_karyawan' => trim(htmlspecialchars($request->nik_karyawan)),
            'user_id' => trim(htmlspecialchars(intval($request->user_id))),
            'tanggal' => now(),
        ];

        $jenisAbsensi = $request->jenis_absensi;


        $jenisAbsensi === 'masuk' ? $data['masuk'] = now() : $data['pulang'] = now();

        $storeData = Absensi::create($data);
        if(!$storeData){
            return back()->withToastError('Gagal merekam!');
        }

        return back()->withToastSuccess('Berhasil merekam!');

    }
}
