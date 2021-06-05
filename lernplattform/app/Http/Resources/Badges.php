<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Badges extends JsonResource
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
                "user_id" => $this->user,
                "badge_id" => $this->badge,
                "achieved" => $this->achieved
            ],
        ];
    }
}
