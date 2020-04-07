<?php


namespace App\Http\Controllers\Admin;


use App\Helpers\OutputForApi;
use App\Helpers\OutputForStripeInfoClientProfile;
use App\Services\Clients\ClientStripeService;


class ClientDataStripeController extends BaseController
{

    protected $service;
    public function __construct(ClientStripeService $clientService, OutputForStripeInfoClientProfile $formatter)
    {
        parent::__construct($clientService, $formatter);
        $this->service = $clientService;
    }

}
