<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Alert;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        $startDate  = $_GET['startDate'];
        $endDate    = $_GET['endDate'];

        $data['absensiRecords'] =  Absensi::latest()->get();

        if(!empty($startDate) && !empty($endDate)){
            $data['absensiRecords'] =  Absensi::whereBetween('tanggal', [$startDate, $endDate])
                                        ->latest()->get();
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
