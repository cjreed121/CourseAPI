<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseSectionResource;
use App\Models\Section;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class SectionController
 * @package App\Http\Controllers
 *
 * @group Courses
 */
class SectionController extends Controller {
    /**
     * Get course and section info by CRN
     *
     * @urlParam semester integer required The code for the target semester. Example: 202201
     * @urlParam section integer required The CRN of the section. Example: 60353
     *
     * @param Semester $semester
     * @param Section $section
     * @return CourseSectionResource
     */
    public function show(Semester $semester, Section $section): CourseSectionResource {
        return new CourseSectionResource($section);
    }
}
