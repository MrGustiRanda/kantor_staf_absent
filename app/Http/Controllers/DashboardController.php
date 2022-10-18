<?php

namespace App\Http\Controllers;

use App\Models\Absent;
use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $staff = Staff::count();
        $absent = Absent::count();
        return view('admin.index', [
            'staff'  => $staff,
            'absent' => $absent,
        ]);
    }
}
