<?php


namespace App\Services\Clients;


use App\Repositories\Clients\ClientRepostiory;
use App\Services\BaseService;

class ClientService extends BaseService
{
    public function __construct(ClientRepostiory $repo)
    {
        parent::__construct($repo);
    }

}
