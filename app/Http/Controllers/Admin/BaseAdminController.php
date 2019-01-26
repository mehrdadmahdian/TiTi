<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseAdminController extends Controller
{
    public function success($message = null, $data = null, $routeName = null) {

        if (request()->ajax()) {
            return [
                'status' => true,
                'data' => $data,
                'message' => $message,
            ];
        } else {
            if ($routeName) {
                return redirect()->route($routeName)->with(['status' => true, 'message' => $message, 'data' => $data]);
            } else {
                return redirect()->route('admin.dashboard');
            }
        }

    }

    public function error($message = null, $routeName = null) {

        if (request()->ajax()) {
            return [
                'status' => false,
                'message' => $message,
            ];
        } else {
            if ($routeName) {
                return redirect()->back()->with(['status' => true, 'message' => $message]);
            } else {
                return redirect()->route('admin.dashboard');
            }
        }
    }
}
