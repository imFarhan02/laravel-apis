<?php
namespace App\Http\Resources\Strapi;
use Illuminate\Http\Resources\Json\JsonResource;

class HelplineContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'alias' => $this->alias,
            'contact' => $this->contact,
            'created_by_id' => $this->created_by_id,
            'document_id' => $this->document_id,
            'icon_id' => $this->icon_id,
            'locale' => $this->locale,
            'owner' => $this->owner,
            'published_at' => $this->published_at,
            'review_comment' => $this->review_comment,
            'subtitle' => $this->subtitle,
            'title' => $this->title,
            'updated_by_id' => $this->updated_by_id,
            'url' => $this->url,
            'workflow_status' => $this->workflow_status,
            // Include related HelplineTypes
            'helpline_type' => HelplineTypeResource::collection($this->whenLoaded('helplineTypes')),
            // Include related StateDeptOrgs
            'state_dept_org' => StateDeptOrgResource::collection($this->whenLoaded('stateDeptOrgs')),
        ];
    }
}
