<?php


namespace App\Http\Controllers\Admin;


use App\Helpers\OutputForDataTable;
use App\Services\Subscriptions\SubscriptionService;

class SubscriptionDataTableController extends BaseController
{
    public function __construct(SubscriptionService $clientService, OutputForDataTable $formatter)
    {
        parent::__construct($clientService, $formatter);
    }

    public function getAllWithClients()
    {
        return $this->formatter->outputFormat($this->service->allWithRelation('client'));
    }

}
