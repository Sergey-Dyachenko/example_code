<?php


namespace App\Http\Controllers\Admin;


use App\Helpers\OutputForDataTable;
use App\Models\Client;
use App\Services\Clients\ClientService;
use App\Http\Resources\GetAllClientsWithTeamsResource;


class ClientDataTableController extends BaseController
{
    public function __construct(ClientService $clientService, OutputForDataTable $formatter)
    {
        parent::__construct($clientService, $formatter);
    }

    public function getAllWithTeams()
    {
       return $this->formatter->outputFormat(GetAllClientsWithTeamsResource::collection(($this->service->allWithRelation('teams'))));
    }

}
