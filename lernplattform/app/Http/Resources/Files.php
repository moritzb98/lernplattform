<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Files extends JsonResource
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
                "path" => $this->path,
                "user_id" => $this->user_id,
                "displayname" => $this->displayname,
                "category_id" => $this->category
            ],
        ];
    }
}
