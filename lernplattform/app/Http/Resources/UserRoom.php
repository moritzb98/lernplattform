<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserRoom extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                "id" => $this->id,
                "name" => $this->name,
                "maxPersons" => $this->maxPersons,
                'user_id' => $this->user,
            ],
        ];
    }
}
