<?php


namespace App\Helpers;


use App\Http\Resources\MailSendNotificationAutocomplete;

class OutputForAutocompleteMailSendNotification implements OutputFormatInterface
{
    public function outputFormat($data)
    {
        return MailSendNotificationAutocomplete::collection($data);
    }
}
