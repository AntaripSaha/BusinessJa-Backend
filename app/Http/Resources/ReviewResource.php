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
            'e_provider_phone'=> $this->eProvider->phone_number,
            'review'=> $this->review,
            'rate'=> $this->rate,
            // 'test_data'=>$this->eProvider,
            'has_media'=> $this->eProvider->has_media,
            'media'=>$this->eProvider->media[0]->thumb,
        ];
    }
}
