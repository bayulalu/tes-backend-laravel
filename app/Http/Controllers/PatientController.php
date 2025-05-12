<?php

namespace App\Http\Controllers;

use App\FilterMacros\PatientSearch;
use App\Http\Requests\PatientRequest;
use App\Http\Resources\PatientResource;
use App\Services\PatientService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 30);
        $sort = $request->input('sort', 'desc');
        $sortBy = $request->input('sortBy', 'created_at');

        $patientSearch = PatientSearch::apply($request);
        $patientSearch->orderBy(Str::snake($sortBy), $sort);
        $results = $patientSearch->paginate($perPage, ['*'], 'page', $page);

        return PatientResource::collection($results);
    }

    public function store(PatientRequest $request)
    {
        $input = $request->all();
        try {
            DB::beginTransaction();
            $patientService = new PatientService();
            $patientService->store($input);

            DB::commit();
            return Response::statusOk(__('messages.store'));
        } catch (\Throwable $th) {
            Log::error($th);
            DB::rollback();
            return Response::statusError($th->getMessage());
        }
    }

    public function update(PatientRequest $request, $idPatient)
    {
        $input = $request->all();
        try {
            DB::beginTransaction();
            $patientService = new PatientService();
            $patientService->update($input, $idPatient);

            DB::commit();
            return Response::statusOk(__('messages.update'));
        } catch (\Throwable $th) {
            Log::error($th);
            DB::rollback();
            return Response::statusError($th->getMessage());
        }
    }

    public function delete($idPatient)
    {
        try {
            DB::beginTransaction();
            $patientService = new PatientService();
            $patientService->delete($idPatient);

            DB::commit();
            return Response::statusOk(__('messages.delete'));
        } catch (\Throwable $th) {
            Log::error($th);
            DB::rollback();
            return Response::statusError($th->getMessage());
        }
    }
}
