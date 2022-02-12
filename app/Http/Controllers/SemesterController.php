<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class SemesterController
 * @package App\Http\Controllers
 *
 * @group Semesters
 */
class SemesterController extends Controller {
    /**
     * Get all semesters
     *
     * @return Response
     */
    public function index(): Response {
        return response(Semester::all());
    }

    /**
     * Create a new semester
     *
     * @authenticated
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response {
        $data = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|integer',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        $semester = new Semester($data);
        $semester->save();

        return response($semester);
    }

    /**
     * Get a specific semester
     *
     * @urlParam semester integer required The code of the semester. Example: 202201
     *
     * @param Semester $semester
     * @return Response
     */
    public function show(Semester $semester): Response {
        return response($semester);
    }

    /**
     * Edit a semester
     *
     * @urlParam semester integer required The code of the semester. Example: 202201
     *
     * @authenticated
     *
     * @param Request $request
     * @param Semester $semester
     * @return Response
     */
    public function update(Request $request, Semester $semester): Response {
        $data = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|integer',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        $semester->update($data);
        return response($semester);
    }

    /**
     * Delete a semester
     *
     * @urlParam semester integer required The code of the semester. Example: 202201
     *
     * @authenticated
     *
     * @param Semester $semester
     * @return Response
     */
    public function destroy(Semester $semester): Response {
        $semester->delete();

        return response("Success");
    }
}
