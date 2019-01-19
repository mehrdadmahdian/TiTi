<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DatatableController extends BaseAdminController implementes Datatabaleable
{
    public function getIndex()
    {
        return view('admin.datatables.index');
    }

    public function getDatatable()
    {
        return UserDatatable::datatable();
    }
}