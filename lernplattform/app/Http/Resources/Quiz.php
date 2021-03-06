<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Quiz extends JsonResource
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
                "id" => $this->id,
            ],
        ];
    }
}
