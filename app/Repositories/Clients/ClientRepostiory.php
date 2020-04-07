<?php


namespace App\Repositories\Clients;


use App\Repositories\Repository;
use App\Models\Client;


class ClientRepostiory extends Repository
{
    protected $model;
    public function __construct(Client $model)
    {
        parent::__construct($model);
    }

    public function getClientsListForDataTable()
    {
       return $this->model->select([
            'id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'card_last_four',
            'trial_ends_at'
        ]);
    }
}
