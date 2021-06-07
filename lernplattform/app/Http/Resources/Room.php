<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Room extends JsonResource
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
                "name" => $this->name,
                "maxPersons" => $this->maxPersons,
                "user_id" => $this->user_id,
                "category_id" => $this->category

            ],
        ];
    }
}
