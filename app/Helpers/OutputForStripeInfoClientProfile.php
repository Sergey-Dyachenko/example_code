<?php


namespace App\Helpers;


use App\Http\Resources\OutputLisenseStripeResource;
use Carbon\Carbon;

class OutputForStripeInfoClientProfile implements OutputFormatInterface
{

    public function outputFormat($data)
    {
        return response()->json([
//            $data
            'date_start'
            => Carbon::createFromTimestamp(reset($data->subscriptions->data)->current_period_start)->format('d/m/Y'),

            'date_end'
            => Carbon::createFromTimestamp(reset($data->subscriptions->data)->current_period_end)->format('d/m/Y'),

            'active' => reset($data->subscriptions->data)->plan->active,

            'payment_period' => reset($data->subscriptions->data)->plan->interval
        ]);
    }
}
