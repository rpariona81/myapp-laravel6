<?php

namespace App\Services;

use App\Models\People;

class PeopleService
{

    public static function create($peopleService)
    {
        $result = false;
        try {
            //code...
            $people = new People();
            $people->firstname = $peopleService->firstname;
            $people->lastname = $peopleService->lastname;
            $people->birthdate = $peopleService->birthdate;
            $people->created_by = auth()->user()->id;
            $people->save();
            $result = true;
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $result;
    }

}
