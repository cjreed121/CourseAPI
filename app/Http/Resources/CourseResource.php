<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'department' => $this->department,
            'description' => $this->description,
            'when_offered' => $this->when_offered,
            'prereqs' => $this->prereqs,
            'cross_list' => $this->cross_list,
            'course_number' => $this->course_number,
            'credit_hours' => $this->credit_hours,
            'sections' => SectionResource::collection($this->sections)
        ];
    }
}
