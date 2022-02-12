<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'instruction_method' => $this->instruction_method,
            'section_number' => $this->section_number,
            'enrolled' => $this->enrolled,
            'max_enrolled' => $this->max_enrolled,
            'remaining' => $this->remaining,
            'instructor' => $this->instructor,
            'crn' => $this->crn,
            'periods' => PeriodResource::collection($this->periods)
        ];
    }
}
