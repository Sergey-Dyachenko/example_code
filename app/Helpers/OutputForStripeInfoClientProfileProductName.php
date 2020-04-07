<?php


namespace App\Helpers;


class OutputForStripeInfoClientProfileProductName implements OutputFormatInterface
{
    public function outputFormat($data)
    {
        return response()->json([
              'name' => $data->name
            ]);
    }
}
