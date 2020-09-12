<?php

namespace App\Http\Controllers\JobBoard;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\JobBoard\ProfessionalReference;
use App\Models\JobBoard\Professional;
use App\Models\Ignug\State;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\JobBoard\Catalogue;


class ProfessionalReferenceController extends Controller
{
    function index(Request $request)
    {
        try {
            
            $professionalReferences = Professional::with(['professionalReferences' => function ($query) {
                $query->with(['institution' => function ($query) {
                    $query->where('state_id', 1);
                }]);
            }])->where('id', $request->user_id)
                ->orderby($request->field, $request->order)
                ->paginate($request->limit);
            return response()->json([
                'pagination' => [
                    'total' => $professionalReferences->total(),
                    'current_page' => $professionalReferences->currentPage(),
                    'per_page' => $professionalReferences->perPage(),
                    'last_page' => $professionalReferences->lastPage(),
                    'from' => $professionalReferences->firstItem(),
                    'to' => $professionalReferences->lastItem()
                ], 'professionalReferences' => $professionalReferences], 200);

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

   function store(Request $request)
   {
       
       try {
           $data = $request->json()->all();
           $dataUser = $data['user'];
           $dataProfessionalReference = $data['professionalReference'];
           $professional = Professional::where('user_id', $dataUser['id'])->first();
             if ($professional) {
                $professionalReference = new ProfessionalReference();
                $professionalReference->position = $dataProfessionalReference ['position'];
                $professionalReference->contact = $dataProfessionalReference ['contact'];
                $professionalReference->phone = $dataProfessionalReference ['phone'];
                $institution = Catalogue::findOrFail($dataProfessionalReference['institution']['id']);
                $state = State::where('code','1')->first();
                $professionalReference->state()->associate($state);
                $professionalReference->institution()->associate($institution);
                $professionalReference->professional()->associate($professional);
                $professionalReference->save();

               return response()->json($professionalReference, 201);
           } else {
              return response()->json(null, 404);
           }
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
        $dataUser = $data['user'];
        $dataProfessionalReference = $data['professionalReference'];
        $professional = Professional::where('user_id', $dataUser['id'])->first();
          if ($professional) {
            $professionalReference = new ProfessionalReference();
            $professionalReference->position = $dataProfessionalReference ['position'];
            $professionalReference->contact = $dataProfessionalReference ['contact'];
            $professionalReference->phone = $dataProfessionalReference ['phone'];
            $institution = Catalogue::findOrFail($dataProfessionalReference['institution']['id']);
            $state = State::where('code','1')->first();
            $professionalReference->state()->associate($state);
            $professionalReference->institution()->associate($institution);
            $professionalReference->professional()->associate($professional);
            $professionalReference->save();

            return response()->json($professionalReference, 201);
        } else {
           return response()->json(null, 404);
           }
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

   public function destroy($id)
   {
       $professionalReference = ProfessionalReference::findOrFail($id);
       $state = State::where('code','3')->first();
       $professionalReference->state()->associate($state);
       $professionalReference->save();
       $professionalReference = ProfessionalReference:: with(['state'=> function($query){
           $query-> where ('code','1');
       }])
           ->get();
       return response()->json([
           'data' => [
               'type' => 'professionalReference',
               'professionalReference' => $professionalReference
           ]
       ], 200);
   }
}
