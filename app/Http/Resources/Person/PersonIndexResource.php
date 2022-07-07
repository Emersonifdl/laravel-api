<?php

namespace App\Http\Resources\Person;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonIndexResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'       => $this->id,
            'name'     => $this->name,
            'avatar'   => $this->avatar ?? 'https://cdn4.iconfinder.com/data/icons/people-avatars-12/24/people_avatar_head_starwars_darth_vader-128.png',
            'favorite' => $this->favorite,
        ];
    }
}
