<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Collection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                "name" => $this->name,
                "user_id" => $this->user,
                "category_id" => $this->category,
                "id" => $this->id,
            ],
        ];
    }
}
