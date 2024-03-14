<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Penggajian;
use PDF;

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

        $totalTunjangan = ($request->tunjangan_jabatan + $request->tunjangan_makan  + $request->tunjangan_transport + $request->tunjangan_bpjs);

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

         $dataGaji = Penggajian::query()
                                ->where('nik_karyawan', $data['nik'])
                                ->where('bulan', $data['bulan'])->first();
        //Hitung total gaji diterima
        $totalGaji = ($dataGaji->gaji_awal + $dataGaji->total_tunjangan);
        $totalPotongan = ($dataGaji->potongan_bpjs + $dataGaji->pph + $dataGaji->pph_per_thn + $dataGaji->pph_per_bln);
        $gajiBersih = ($totalGaji - $totalPotongan);
        $terbilang = terbilang($gajiBersih);
         if($dataGaji){
            $dataGaji = $dataGaji;
         }else{
            return view('adminpanel.pages.penggajian.data_null');
         }
         return view('adminpanel.pages.penggajian.cetak_gaji', compact('dataGaji', 'gajiBersih', 'terbilang'));
        }

    }

    //Cetak PDF by NIK
    public function cetakPDF(Request $request, $nik)
    {
        $data = Penggajian::query()
                    ->where('nik_karyawan', $nik)
                    ->where('bulan', $request->bulan)
                    ->first();
        //Hitung total gaji diterima
        $totalGaji = ($data->gaji_awal + $data->total_tunjangan);
        $totalPotongan = ($data->potongan_bpjs + $data->pph + $data->pph_per_thn + $data->pph_per_bln);
        $data['gajiBersih'] = ($totalGaji - $totalPotongan);
        $data['terbilang'] = terbilang($data['gajiBersih']);
        $pdf = PDF::loadview('adminpanel.pages.penggajian.export_pdf', ['data' => $data]);
        return $pdf->stream();
    }

    //Rekap gaji semua karyawan
    public function rekapGaji(){
        $all_data = Penggajian::latest()->get();
        return view('adminpanel.pages.penggajian.all_data', compact('all_data'));
    }

}
