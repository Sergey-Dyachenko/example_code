<?php


namespace App\Http\Controllers\Admin;


use App\Services\Products\ProductService;
use App\Helpers\OutputForStripeInfoClientProfileProductName;

class ClientDataProductController extends BaseController
{
    protected $service;
    public function __construct(ProductService $productService, OutputForStripeInfoClientProfileProductName $formatter)
    {
        parent::__construct($productService, $formatter);
        $this->service = $productService;
    }

    public function getStripeProductName($id)
    {
        return $this->formatter->outputFormat($this->service->getProductNameByUserId($id));
    }

}
