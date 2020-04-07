<?php


namespace App\Helpers;


use Yajra\DataTables\DataTables;

class OutputForDataTable implements OutputFormatInterface
{
    public function outputFormat($data)
    {
        return DataTables::of($data)->make(true);
    }
}
