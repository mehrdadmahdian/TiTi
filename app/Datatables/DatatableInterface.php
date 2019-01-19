<?php

namespace App\Datatables;

interface DatatableInterface
{
    public function getData();

    public function query();
}