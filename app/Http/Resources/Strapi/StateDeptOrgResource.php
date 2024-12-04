<?php

namespace App\Http\Resources\Strapi;

use Illuminate\Http\Resources\Json\JsonResource;

class StateDeptOrgResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'alias' => $this->alias,
            'title' => $this->title,
            'code' => $this->code,
            'capital' => $this->capital,
            'workflow_status' => $this->workflow_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
