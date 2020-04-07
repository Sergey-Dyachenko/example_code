<?php


namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class GetAllClientsWithTeamsResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */


    public function toArray($request)
    {
       foreach ($this->count_of_employees as $employee )
       {
           $this->count  = $employee['title'];
       }

        foreach ($this->team_roles as $role )
        {
            $this->role  = $role['title'];
        }

        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'company_name' => $this->teams['name'] ?? NULL,
            'number_of_employees' => $this->count ?? NULL,
            'team_role' => $this->role ?? NULL,
            'email' => $this->email,
            'phone' => $this->phone,
            'card_last_four' => $this->card_last_four
        ];
    }
}
