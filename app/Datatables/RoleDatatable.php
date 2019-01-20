<?php
/**
 * Created by PhpStorm.
 * User: salma
 * Date: 1/17/2019
 * Time: 7:34 PM
 */

namespace App\Datatables;

use App\User;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleDatatable extends BaseDatatable implements DatatableInterface
{
    public function getData()
    {
        return Datatables::of($this->query())->make(true);
    }

    public function query()
    {
        return Role::query();
    }
}