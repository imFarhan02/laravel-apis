<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'alias' => $this->alias,
            'description' => $this->description,
            'tags' => $this->tags,
            'parent_cat_id' => $this->parent_cat_id,
            'colors' => [
                'bg_color_1' => $this->bg_color_1,
                'bg_color_2' => $this->bg_color_2,
                'bg_color_3' => $this->bg_color_3,
                'color_grad_1' => $this->color_grad_1,
                'color_grad_2' => $this->color_grad_2,
            ],
            'icon' => [
                'icon_id' => $this->icon_id,
                'icon_url' => $this->icon_url,
            ],
            'bg1' => [
                'bg1_id' => $this->bg_1_id,
                'bg1_url' => $this->bg_1_url,
            ],
            'bg2' => [
                'bg2_id' => $this->bg_2_id,
                'bg2_url' => $this->bg_2_url,
            ],
            'bg3' => [
                'bg3_id' => $this->bg_3_id,
                'bg3_url' => $this->bg_3_url,
            ],
            'bg4' => [
                'bg4_id' => $this->bg_4_id,
                'bg4_url' => $this->bg_4_url,
            ],
            'is_show_homepage' => $this->is_show_homepage,
            'workflow_status' => $this->workflow_status,
            'review_comment' => $this->review_comment,
            'created_by_id' => $this->created_by_id,
            'updated_by_id' => $this->updated_by_id,
            'published_at' => $this->published_at->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}

