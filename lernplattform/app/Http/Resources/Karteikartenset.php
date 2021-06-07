<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Karteikartenset extends JsonResource
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
                "category_id" => $this->category,
                "name" => $this->name,
                'user_id' => $this->user_id,
                "id" => $this->id,
            ],
        ];
    }
}
