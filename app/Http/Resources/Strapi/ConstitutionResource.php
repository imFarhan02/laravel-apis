<?php

namespace App\Http\Resources\Strapi;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConstitutionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'alias' => $this->alias,
            'description' => $this->description,
            'document' => [
                'url' => $this->url,
                'url_text' => $this->url_text,
            ],
            'banner' => $this->when($this->banner_id, [
                'id' => $this->banner_id,
                'url' => $this->getBannerUrl(), // Assuming you have a method to get the banner URL
            ]),
            'review_comment' => $this->review_comment,
            'workflow_status' => $this->workflow_status,
            'published_at' => $this->published_at->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'created_by_id' => $this->created_by_id,
            'updated_by_id' => $this->updated_by_id,
        ];
    }

    /**
     * Additional method to get the banner URL if needed.
     *
     * @return string|null
     */
    protected function getBannerUrl()
    {
        // Example implementation if there's a helper to get the URL
        return optional($this->banner)->url ?? null;
    }
}

