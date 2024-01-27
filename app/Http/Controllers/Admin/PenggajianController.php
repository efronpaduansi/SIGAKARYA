<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Penggajian;


class PenggajianController extends Controller
{
    public function index()
    {
        return view("adminpanel.pages.penggajian.index");
    }

    public function create()
    {
        $data['karyawans'] = Karyawan::oldest('nama')->get();

        return view("adminpanel.pages.penggajian.form_create", ['data' => $data]);
    }

    public function formGaji(Request $request)
    {
        $nik = $request->nik_karyawan;
        $bulan = $request->bulan;

        $karyawan = Karyawan::where('nik', $nik)->first();

        return view('adminpanel.pages.penggajian.form_gaji', compact('karyawan', 'bulan'));
    }

    public function store(Request $request, Penggajian $penggajian)
    {

        $totalTunjangan = ($request->tunjangan_jabatan + $request->tunjangan_makan + $request->tunjangan_makan + $request->tunjangan_transport + $request->tunjangan_bpjs);

        $data = [
            'bulan' => $request->bulan,
            'nik_karyawan' => $request->nik_karyawan,
            'gaji_awal' => $request->gaji_awal,
            'tunjangan_jabatan' => $request->tunjangan_jabatan,
            'tunjangan_makan' => $request->tunjangan_makan,
            'tunjangan_transport' => $request->tunjangan_transport,
            'tunjangan_bpjs'    => $request->tunjangan_bpjs,
            'potongan_bpjs'     => $request->potongan_bpjs,
            'total_tunjangan'   => $totalTunjangan,
            'pph'               => $request->pph,
            'pph_per_thn'       => $request->pph_per_thn,
            'pph_per_bln'       => $request->pph_per_bln,
            'gaji_netto'        => 0
        ];

        $storeData = $penggajian->create($data);

        if(!$storeData) {
            return back()->withToastError('Simpan gagal!');
        }

        return back()->withToastSuccess('Simpan berhasil!');
    }

    /*Rekap Gaji Karyawan */
    public function cetakGaji(Request $request)
    {
        if(!isset($_GET['nik_karyawan']) || !isset($_GET['bulan'])){
            $data['karyawans'] = Karyawan::oldest('nama')->get();
            return view('adminpanel.pages.penggajian.form_select', ['data' => $data]);
        }else{
            $data = [
                'nik' =>  $request->nik_karyawan,
                'bulan' => $request->bulan
            ];
           $this->rekapGajiAction($data);
        }

    }

    private function rekapGajiAction($data)
    {
        // $data['penggajian'] = Penggajian::query()->where('nik_karyawan', $data['nik'])
        //                     ->where('bulan', $data['bulan'])
        //                     ->first();
        return view('adminpanel.pages.penggajian.rekap_select');
    }

}
