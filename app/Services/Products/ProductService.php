<?php


namespace App\Services\Products;


use App\ApiAdapters\StripeApiAdapter;
use App\Services\BaseService;
use Stripe\Product;
use App\Repositories\ProductRepository;

class ProductService extends BaseService
{
    public function __construct(ProductRepository $repo)
    {
        parent::__construct($repo);
    }

    public function getProductNameByUserId($id)
    {
        return $this->repo->getProductNameByUserId($id);
    }

}
