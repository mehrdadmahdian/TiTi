<?php
/**
 * Created by PhpStorm.
 * User: salma
 * Date: 1/17/2019
 * Time: 7:34 PM
 */

namespace App\Datatables;

use App\User;
use Yajra\DataTables\Facades\DataTables;

class BaseDatatable
{
    public function with(array $params)
    {
        if (isAssoc($params)) {
            foreach($params as $key => $value) {
                $this->$key = $value;
            }
        }
        return $this;
    }
}