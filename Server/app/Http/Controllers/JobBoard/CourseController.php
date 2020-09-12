<?php

namespace App\Http\Controllers\JobBoard;

use App\Http\Controllers\Controller;
use App\Models\Ignug\Catalogue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\JobBoard\Professional;
use App\Models\JobBoard\Course;

class CourseController extends Controller
{
    // Muestra lista de cursos existentes //
    function index(Request $request)
    {
        try {
            
            $courses = Professional::with(['courses' => function ($query) {
                $query->with(['institution' => function ($query) {
                    $query->where('state_id', 1);
                }])
                ->with(['eventType' => function ($query) {
                    $query->where('state_id', 1);
                }])
                ->with(['certificationType' => function ($query) {
                    $query->where('state_id', 1);
                }]);

            }])->where('id', $request->user_id)
                ->orderby($request->field, $request->order)
                ->paginate($request->limit);
            return response()->json([
                'pagination' => [
                    'total' => $courses->total(),
                    'current_page' => $courses->currentPage(),
                    'per_page' => $courses->perPage(),
                    'last_page' => $courses->lastPage(),
                    'from' => $courses->firstItem(),
                    'to' => $courses->lastItem()
                ], 'courses' => $courses], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException $e) {
            return response()->json($e, 400);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        } catch (ErrorException $e) {
            return response()->json($e, 500);
        }
    }

    function show($id)
    {
        try {
            $course = Course::findOrFail($id);
            return response()->json(['course' => $course], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException $e) {
            return response()->json($e, 400);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

    function store(Request $request)
    {
        try {
            $data = $request->json()->all();
            //$dataUser = $data['user'];
            $dataCourse = $data['course'];
            //$professional = Professional::where('user_id', $dataUser['id'])->first();
           // if ($professional) {
                $course = new Course();
                $course->event_name = strtoupper($dataCourse ['event_name']);
                $course->start_date = strtoupper($dataCourse ['start_date']);
                $course->end_date = strtoupper($dataCourse ['end_date']);
                $course->hours = strtoupper($dataCourse ['hours']);
                $eventType = Catalogue::findOrFail($dataCourse['event_type']['id']);
                $certificationType = Catalogue::findOrFail($dataCourse['certification_type']['id']);
                $institution = Catalogue::findOrFail($dataCourse['institution']['id']);
                $course->eventType()->associate($eventType);
                $course->certificationType()->associate($eventType);
                $course->professional()->associate($professional);
                $course->institution()->associate($institution);
                $course->save();

                return response()->json($response, 201);
            //} else {
            //    return response()->json(null, 404);
           // }
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException $e) {
            return response()->json($e, 400);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

    function update(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataCourse = $data['courses'];
            $course = Course::findOrFail($dataCourse['id'])->update([
                'event_name' => strtoupper($dataCourse ['event_name']),
                'start_date' => strtoupper($dataCourse ['start_date']),
                'finish_date' => strtoupper($dataCourse ['finish_date']),
                'hours' => $dataCourse ['hours'],
            ]);
            return response()->json($professionalReference, 201);
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException $e) {
            return response()->json($e, 400);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

    function destroy(Request $request)
    {
        try {
            $course = Course::findOrFail($request->id)->delete();
            return response()->json($course, 201);
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException $e) {
            return response()->json($e, 400);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }
}
