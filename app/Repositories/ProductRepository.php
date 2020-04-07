<?php


namespace App\Repositories;

use App\ApiAdapters\StripeApiAdapter;
use App\Models\Client;
use App\Models\Products;
use App\Repositories\ApiRepository;
use Illuminate\Database\Eloquent\Model;




class ProductRepository extends Repository
{
    private $thirdpartyRepo;

    public function __construct(Products $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $repo
     * @return mixed
     */

    private function setRepo($repo)
    {
        $this->thirdpartyRepo = $repo;
    }

    private function getProductStripeIdByUserID($id)
    {
        $this->setRepo(app(ApiRepository::class));
        $this->thirdpartyRepo->setAdapter(app(StripeApiAdapter::class));
        return $this->thirdpartyRepo->getProductStripeIdByUserId($id);
    }

    public function getProductNameByUserID($id)
    {
     $productStripeId = $this->getProductStripeIdByUserID($id);
     return $this->model->where('stripe_id', $productStripeId)->first();
    }
}
