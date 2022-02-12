<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseSectionResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'title' => $this->course->title,
            'department' => $this->course->department,
            'course_number' => $this->course->course_number,
            'credit_hours' => $this->course->credit_hours,
            'description' => $this->course->description,
            'when_offered' => $this->course->when_offered,
            'prereqs' => $this->course->prereqs,
            'cross_list' => $this->course->cross_list,
            'section_number' => $this->section_number,
            'crn' => $this->crn,
            'instructor' => $this->instructor,
            'enrolled' => $this->enrolled,
            'max_enrolled' => $this->max_enrolled,
            'remaining' => $this->remaining,
            'instruction_method' => $this->instruction_method,
            'periods' => PeriodResource::collection($this->periods)
        ];
    }
}
