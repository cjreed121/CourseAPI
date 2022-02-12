<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PeriodResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'location' => $this->location,
            'type' => $this->type,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'days' => $this->days
        ];
    }
}
