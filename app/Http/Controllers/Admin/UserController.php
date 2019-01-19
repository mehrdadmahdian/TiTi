<?php
namespace App\Http\Controllers\Admin;

use App\Datatables\DatatableControllerInterface;
use App\Datatables\UserDatatable;

class UserController extends BaseAdminController implements DatatableControllerInterface
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function getDatatable()
    {
        return (new UserDatatable())->getData();
    }
}