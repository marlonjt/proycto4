<?php

namespace App\Http\Controllers\JobBoard;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\JobBoard\ProfessionalExperience;
use App\Models\JobBoard\Professional;
use App\Models\Ignug\State;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\JobBoard\Catalogue;


class ProfessionalExperienceController extends Controller
{
// Muestra los datos del profesional con experiencia//
function index(Request $request)
{
    try {
        $professionalExperiences = Professional::with(['professionalExperiences' => function ($query) {
            $query->with(['professional' => function ($query) {
                $query->where('state_id', 1);
            }]);
        }])->where('id', $request->user_id)
            ->orderby($request->field, $request->order)
            ->paginate($request->limit);
        return response()->json([
            'pagination' => [
                'total' => $professionalExperiences->total(),
                'current_page' => $professionalExperiences->currentPage(),
                'per_page' => $professionalExperiences->perPage(),
                'last_page' => $professionalExperiences->lastPage(),
                'from' => $professionalExperiences->firstItem(),
                'to' => $professionalExperiences->lastItem()
            ], 'professionalExperiences' => $professionalExperiences], 200);

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
            $professionalExperience = ProfessionalExperience::findOrFail($id);
            return response()->json(['professionalExperience' => $professionalExperience], 200);
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


//Almacena los  Datos creado del profesional que envia//
function store(Request $request)
{
    try {
        $data = $request->json()->all();
        $dataUser = $data['user'];
        $dataProfessionalExperience = $data['professionalExperience'];
        $professional = Professional::where('user_id', $dataUser['id'])->first();
          if ($professional) {
             $professionalExperience = new ProfessionalExperience();
             $professionalExperience->employer = strtoupper($dataProfessionalExperience ['employer']);
             $professionalExperience->position = strtoupper($dataProfessionalExperience ['position']);
             $professionalExperience->job_description = strtoupper($dataProfessionalExperience ['job_description']);
             $professionalExperience->start_date = $dataProfessionalExperience ['start_date'];
             $professionalExperience->end_date = $dataProfessionalExperience ['end_date'];
             $professionalExperience->reason_leave = strtoupper($dataProfessionalExperience ['reason_leave']);
             $professionalExperience->current_work = $dataProfessionalExperience ['current_work'];
             $state = State::where('code','1')->first();
             $professionalExperience->state()->associate($state);
             $professionalExperience->professional()->associate($professional);
             $professionalExperience->save();
            return response()->json($professionalExperience, 201);
        } else {
           return response()->json(null, 404);
        }
    }catch (ModelNotFoundException $e) {
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


//Actualiza los datos del profesional
    function update(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataUser = $data['user'];
            $dataProfessionalExperience = $data['professionalExperiences'];
            $professional = Professional::where('user_id', $dataUser['id'])->first();
           if ($professional) {
            $professionalExperience = new ProfessionalExperience();
            $professionalExperience->position = $dataProfessionalExperience ['position'];
            $professionalExperience->employer = $dataProfessionalExperience ['employer'];
            $professionalExperience->job_description = $dataProfessionalExperience ['job_description'];;
            $professionalExperience->start_date = $dataProfessionalExperience ['start_date'];
            $professionalExperience->end_date = $dataProfessionalExperience ['end_date'];
            $professionalExperience->reason_leave = $dataprofessionalExperience ['reason_leave'];
            $professionalExperience->current_work = $dataprofessionalExperience ['current_work'];
            $professionalExperience->professional()->associate($professional);
            $professionalExperience->update();
                return response()->json($professionalExperience, 201);
            } else {
               return response()->json(null, 404);
            }
        }catch (ModelNotFoundException $e) {
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
    
//Elimina los datos del profesional

    public function destroy($id)
    {
        
        $professionalExperience = ProfessionalExperience::findOrFail($id);
        $state = State::where('code','3')->first();
        $professionalExperience->state()->associate($state);
        $professionalExperience->update();
        $professionalExperience = ProfessionalExperience :: with(['state'=> function($query){
            $query-> where ('code','1');
        }])
            ->get();
        return response()->json([
            'data' => [
                'type' => 'professional_experiences',
                'professionalExperience' => $professionalExperience
            ]
        ], 200);
    }

}
