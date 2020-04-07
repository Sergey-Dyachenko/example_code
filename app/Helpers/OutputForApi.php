<?php


namespace App\Helpers;



class OutputForApi implements OutputFormatInterface
{
    public function outputFormat($data)
    {
        return response()->json($data);
    }
}
