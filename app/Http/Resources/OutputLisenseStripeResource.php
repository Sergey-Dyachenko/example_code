<?php


namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class OutputLisenseStripeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'date_start'
            => Carbon::createFromTimestamp(reset($this->subscriptions->data)->current_period_start)->format('d/m/Y'),

            'date_end'
            => Carbon::createFromTimestamp(reset($this->subscriptions->data)->current_period_end)->format('d/m/Y'),

            'active' => reset($this->subscriptions->data)->plan->active,

            'payment_period' => reset($this->subscriptions->data)->plan->interval
        ];
    }

}
