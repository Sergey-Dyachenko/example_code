<?php


namespace App\Http\Controllers\Admin;


use App\Helpers\OutputForAutocompleteMailSendNotification;
use App\Helpers\OutputFormatInterface;
use App\Services\Clients\ClientService;
use App\Services\ServiceInterface;

class ClientForSendNotificationsAutoCompleteController extends BaseController
{
    public function __construct(ClientService $clientService, OutputForAutocompleteMailSendNotification $formatter)
    {
        parent::__construct($clientService, $formatter);
    }
}
