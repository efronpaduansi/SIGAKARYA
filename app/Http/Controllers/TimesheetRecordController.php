<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetRecordController extends Controller
{
    public function index()
    {
        $data['timesheets'] = Timesheet::latest()->get();

        return view('adminpanel.pages.timesheet', ['data' => $data]);
    }
}
