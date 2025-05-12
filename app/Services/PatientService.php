<?php

namespace App\Services;

use App\Models\Patient;
use App\Models\User;

class PatientService
{

    public function store($input)
    {
        $user = User::Create([
            'name' => $input['name'],
            'id_type' => $input['idType'],
            'id_no' => $input['idNo'],
            'gender' => $input['gender'],
            'dob' => $input['dob'],
            'address' => $input['address']
        ]);

        Patient::create([
            'user_id' => $user->id,
            'medium_acquisition' => $input['mediumAcquisition'],
        ]);
    }

    public function update($input, $idPatient)
    {
        $patient = Patient::findOrFail($idPatient);
        $patient->update([
            'medium_acquisition' => $input['mediumAcquisition'],
        ]);
        $patient->user->update([
            'name' => $input['name'],
            'id_type' => $input['idType'],
            'id_no' => $input['idNo'],
            'gender' => $input['gender'],
            'dob' => $input['dob'],
            'address' => $input['address']
        ]);
    }

    public function delete($id)
    {
        $patient = Patient::findOrFail($id);
        $userId = $patient->user_id;
        $patient->delete();
        User::where('id', $userId)->delete();
    }
}
