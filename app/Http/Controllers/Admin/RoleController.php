<?php

namespace App\Http\Controllers\Admin;

use App\Datatables\DatatableControllerInterface;
use App\Datatables\RoleDatatable;
use App\Http\Requests\Role\StoreRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends BaseAdminController implements DatatableControllerInterface
{
    public function index()
    {
        return view('admin.roles.index');
    }

    public function getDatatable()
    {
        return (new RoleDatatable())->getData();
    }

    public function store(StoreRole $request)
    {

        DB::beginTransaction();
        try {
            $role = Role::create([
                'name'        => $request->name,
                'guard_name' => 'web'
            ]);
            $role->permissions()->attach($request->permissions);

            DB::commit();
            return redirect()->back()->with(['message' => trans('message.store.successful')]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
