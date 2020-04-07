<?php


namespace App\Repositories;
use App\ApiAdapters\ApiAdapterInterface;
use App\Models\Client;


class ApiRepository extends Repository
{
    /**
     * @var
     */
    protected $model;
    private $apiAdapter;

    /**
     * ApiRepository constructor.
     * @param Client $model
     */
    public function __construct(Client $model)
    {
        parent::__construct($model);
        $this->model = $model;

    }

    public function setAdapter(ApiAdapterInterface $apiAdapter)
    {
        $this->apiAdapter = $apiAdapter;
    }

    public function show($id)
    {
        return   $this->apiAdapter->show($this->model->find($id)->stripe_id);
    }


    public function getProductStripeIdByUserId($id)
    {
         return reset($this->apiAdapter->getProductName($this->model->find($id)->stripe_id)->subscriptions->data)
             ->plan->product;
    }
}
