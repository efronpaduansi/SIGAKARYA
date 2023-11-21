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
                        ->latest()
                        ->first();

        if(!$data['record']){
            $data['keterangan'] = 'Anda belum melakukan rekam absensi!';
            $data['recordId'] = null;
        }else{
            $jamMasuk = $data['record']['masuk'];
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
        ];

        $jenisAbsensi = $request->jenis_absensi;

        if($jenisAbsensi === 'masuk'){
            $data['masuk'] = now();
            $storeData = Absensi::create($data);
            if(!$storeData){
                return back()->withToastError('Gagal merekam!');
            }

        }elseif($jenisAbsensi == 'pulang'){
            $recordId = $request->recordId;
            $updateData = Absensi::where('id', $recordId)->update(array('pulang' => now()));

            if(!$updateData){
                return back()->withToastError('Gagal merekam!');
            }
        }

        return back()->withToastSuccess('Berhasil merekam!');

    }
}
