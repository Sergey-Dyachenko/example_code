<?php


namespace App\Http\Controllers\Admin;


use App\Helpers\OutputForApi;
use App\Services\Clients\ClientService;
use App\Services\Subscriptions\SubscriptionService;

class SubscriptionApiController extends BaseController
{


    public function __construct(SubscriptionService $clientService, OutputForApi $formatter)
    {
        parent::__construct($clientService, $formatter);
        $this->service = $clientService;
        $this->formatter = $formatter;
    }

    public function changeStatus($id)
    {
       return $this->formatter->outputFormat($this->service->changeStatus($id));
    }



}
