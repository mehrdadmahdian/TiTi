<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class DashboardController extends BaseAdminController
{
    public function index(){
        return view('admin.dashboard');
    }
}
