<?php


namespace App\Http\Controllers\Admin;


use App\Helpers\OutputForApi;
use App\Services\Clients\ClientService;

class ClientProfileController
{
    public function profile($id)
    {
        return view('admin/profile', ['id' => $id]);
    }
}
