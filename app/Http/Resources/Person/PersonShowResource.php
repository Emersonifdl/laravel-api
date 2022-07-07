<?php

namespace App\Http\Resources\Person;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonShowResource extends JsonResource
{
    public function toArray($request)
    {
        $response           = parent::toArray($request);
        $response['phones'] = $this->phones;
        $response['emails'] = $this->emails;
        $response['avatar'] = $this->avatar ?? 'https://cdn4.iconfinder.com/data/icons/people-avatars-12/24/people_avatar_head_starwars_darth_vader-128.png';

        return $response;
    }
}
