<?php


namespace App\Repositories\Subscriptions;


use App\Models\Subscription;
use App\Repositories\Repository;

class SubscriptionRepository extends Repository
{

    public function __construct(Subscription $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function changeStatus($id)
    {
       $model =  $this->model->where('id', $id)->first();
       $model->stripe_status = $model->stripe_status == 'active' ? 'disabled' : 'active';
       $model->save();
       return $model;
    }


}
