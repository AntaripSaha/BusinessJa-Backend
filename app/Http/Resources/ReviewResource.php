<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'id'=> $this->id,
            'user_id'=> $this->user_id,
            'e_provider_id'=> $this->e_provider_id,
            'e_provider_name'=> $this->eProvider->name,
            'review'=> $this->review,
            'rate'=> $this->rate,
            'media'=> $this->media,
        ];
    }
}
