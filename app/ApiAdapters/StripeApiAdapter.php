<?php


namespace App\ApiAdapters;
use Stripe\Customer;
use Stripe\Plan;

class StripeApiAdapter implements ApiAdapterInterface
{
    public function show($id)
    {
       return Customer::retrieve($id);
    }

    public function getProductName($id)
    {
        return Customer::retrieve($id);
    }
}
