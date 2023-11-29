<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetRecordController extends Controller
{
    public function index()
    {
        $data['karyawan'] = Karyawan::query()->oldest('nama')->get();
        $data['timesheets'] = Timesheet::latest()->get();

        return view('adminpanel.pages.timesheet', ['data' => $data]);
    }
}
