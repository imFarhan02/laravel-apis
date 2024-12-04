<?php

namespace App\Http\Resources\Strapi;

use Illuminate\Http\Resources\Json\JsonResource;

class HelplineTypeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'alias' => $this->alias,
            'title' => $this->title,
            'icon_id' => $this->icon_id,
            'workflow_status' => $this->workflow_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}