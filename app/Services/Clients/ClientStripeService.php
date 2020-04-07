<?php
namespace App\Services\Clients;

use App\ApiAdapters\ApiAdapterInterface;
use App\ApiAdapters\StripeApiAdapter;
use App\Services\BaseService;
use App\Repositories\ApiRepository;

class ClientStripeService extends BaseService
{
    protected $apiAdapter;
    public function __construct(ApiRepository $repo)
    {
        parent::__construct($repo);
    }

    public function find($id)
    {
        $this->apiAdapter = new StripeApiAdapter();
        $this->repo->setAdapter($this->apiAdapter );
        return $this->repo->show($id);
    }



}
