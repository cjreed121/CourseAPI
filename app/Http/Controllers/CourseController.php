<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\Period;
use App\Models\Section;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

/**
 * Class CourseController
 * @package App\Http\Controllers
 *
 * @group Courses
 */
class CourseController extends Controller {
    /**
     * List courses
     *
     * Returns a paginated list of courses. Up to 20 courses per page.
     *
     * @urlParam semester integer required The code for the target semester. Example: 202201
     *
     * @queryParam page integer Example: 1
     *
     * @apiResourceCollection App\Http\Resources\CourseResource
     * @apiResourceModel App\Models\Course paginate=20,simple
     *
     * @param Semester $semester
     * @return ResourceCollection
     */
    public function index(Semester $semester): ResourceCollection {
        return CourseResource::collection($semester->courses()->simplePaginate(20));
    }

    /**
     * Create courses
     *
     * Deletes all courses and creates new courses from provided JSON.
     *
     * JSON is passed in as body
     *
     * @urlParam semester integer required The code for the target semester. Example: 202201
     *
     * @authenticated
     *
     * @param Request $request
     * @param Semester $semester
     * @return Response
     */
    public function store(Request $request, Semester $semester): Response {
        $data = $request->json()->all();

        DB::beginTransaction();

        DB::table('courses')->delete();

        foreach ($data as $c) {
            $course = new Course();
            $course->title = $c['title'];
            $course->course_number = $c['courseNum'];
            $course->department = $c['dept'];
            $course->credit_hours = $c['credHours'];
            $course->description = $c['description'] ?? '';
            $course->when_offered = $c['whenOffered'] ?? '';
            $course->prereqs = $c['prereqs'] ?? '';
            $course->cross_list = $c['crossList'] ?? '';
            $course->semester()->associate($semester);

            $course->save();

            foreach ($c['sections'] as $s) {
                $section = new Section();
                $section->instruction_method = $s['instrucMethod'];
                $section->section_number = $s['sectionNum'];
                $section->enrolled = $s['enrolled'];
                $section->max_enrolled = $s['maxEnrolled'];
                $section->remaining = $s['remaining'];
                $section->instructor = $s['instructor'];
                $section->crn = $s['crn'];
                $section->course()->associate($course);
                $section->save();

                foreach ($s['periods'] as $p) {
                    $period = new Period();
                    $period->location = $p['location'];
                    $period->type = $p['type'] ?? "";
                    $period->start_time = $p['startTime'];
                    $period->end_time = $p['endTime'];
                    $period->days = $p['days'];
                    $period->section()->associate($section);
                    $period->save();
                }
            }
        }

        DB::commit();

        return response("Success");
    }

    /**
     * Get specific course details by ID
     *
     * @apiResourceModel App\Models\Course
     * @apiResource App\Http\Resources\CourseResource
     *
     * @urlParam semester integer required The code for the target semester. Example: 202201
     * @urlParam course integer required The ID of the course.
     *
     * @param Course $course
     * @return Response
     */
    public function show(Course $course): Response {
        return response(new CourseResource($course));
    }
}
