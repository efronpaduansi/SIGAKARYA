<?php

namespace App\Http\Controllers\Admin;

use Alert;
use Carbon\Carbon;
use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsensiController extends Controller
{
    public function index()
    {
        //Cek user role akses
        if(auth()->user()->role == 'karyawan'){
            $userEmail = auth()->user()->email;
            //Ambil nik karyawan
            $karyawan = Karyawan::query()->where('email', $userEmail)->first();

            if(isset($_GET['startDate']) || isset($_GET['endDate'])){
                $startDate  = $_GET['startDate'];
                $endDate    = $_GET['endDate'];
                $data['absensiRecords'] =  Absensi::whereBetween('tanggal', [$startDate, $endDate])
                                            ->where('nik_karyawan', $karyawan->nik)
                                            ->latest()->get();
            }else{
                $data['absensiRecords'] =  Absensi::where('nik_karyawan', $karyawan->nik)->latest()->get();
            }
        }else{
            if(isset($_GET['startDate']) || isset($_GET['endDate'])){
                $startDate  = $_GET['startDate'];
                $endDate    = $_GET['endDate'];
                $data['absensiRecords'] =  Absensi::whereBetween('tanggal', [$startDate, $endDate])
                                            ->latest()->get();
            }
            $data['absensiRecords'] =  Absensi::latest()->get();
        }

        return view('adminpanel.pages.absensi.manage', ['data' => $data]);
    }

    public function absensiHariIni()
    {
        $hariIni = date('Y-m-d');
        $data['absensiRecords'] = Absensi::where('tanggal', $hariIni)->get();

        return view('adminpanel.pages.absensi.today', ['data'=> $data]);
    }

    public function destroy($id)
    {
        $deleteData = Absensi::where('id', $id)->delete();

        if(!$deleteData){
            return back()->withToastError('Hapus gagal!');
        }

        return back()->withToastSuccess('Hapus berhasil!');
    }

}
