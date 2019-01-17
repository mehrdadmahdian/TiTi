<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class UserController extends BaseAdminController
{
    public function index(){
        return view('admin.users.index');
    }
}