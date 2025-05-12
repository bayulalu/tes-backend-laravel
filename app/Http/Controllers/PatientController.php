<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Services\PatientService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
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
}
