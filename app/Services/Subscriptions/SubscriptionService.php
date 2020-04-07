<?php


namespace App\Services\Subscriptions;

use App\Repositories\Subscriptions\SubscriptionRepository;
use App\Services\BaseService;

class SubscriptionService extends BaseService
{

    private $subscriptionRepository;

    public function __construct(SubscriptionRepository $repo)
    {
        parent::__construct($repo);
        $this->subscriptionRepository = $repo;
    }

    public function changeStatus($id)
    {
        return  $this->subscriptionRepository->changeStatus($id);
    }
}
