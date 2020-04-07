<?php


namespace App\Http\Controllers\Admin;


use App\Helpers\OutputForApi;
use App\Services\Clients\ClientService;

class ClientApiController extends BaseController
{
    public function __construct(ClientService $clientService, OutputForApi $formatter)
    {
        parent::__construct($clientService, $formatter);
    }
}
