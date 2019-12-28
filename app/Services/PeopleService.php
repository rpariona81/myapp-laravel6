<?php

namespace App\Services;

use App\Models\People;

class PeopleService
{

    public static function create($peopleService)
    {
        $people = new People();
        $people->firstname = $peopleService->firstname;
        $people->lastname = $peopleService->lastname;
        $people->birthdate = $peopleService->birthdate;
        $people->created_by = auth()->user()->id;
        $people->save();
    }

}
