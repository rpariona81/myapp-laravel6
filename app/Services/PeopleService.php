<?php

namespace App\Services;

use App\Models\People;
use App\Models\BK_People;
use DB;

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

    public static function updatePeople($peopleService)
    {
        $result = false;
        try {
            //code...
            $people_ant = People::find($peopleService->id);
            if($people_ant == null){
                printf("No se encuentra un registro con el id: ".$peopleService->id);
                return $result;
            }
            if($people_ant->created_by!=null){
                $people_ant->created_by == null;
            }
            if($people_ant->updated_by!=null){
                $people_ant->updated_by == null;
            }
            $people = People::findOrFail($peopleService->id);
            $people->firstname = $peopleService->firstname;
            $people->lastname = $peopleService->lastname;
            $people->birthdate = $peopleService->birthdate;
            $created_ant = $people->created_by;
            if($people->created_by!=null){
                $people->created_by==null;
            }
            $created_ant = $people->created_by;
            if($people->updated_by==null){
                $people->updated_by==null;
            }
            if ($people_ant==$people) {
                printf("people con id: ".$people->id." - ".$people->firstname." mantiene la informacion de userid: ".$created_ant);
                return $result;
            }
            $people->created_by = $created_ant;
            $people->updated_by = auth()->user()->id;
            $people->save();
            $bk_people = new BK_People();
            $bk_people->fill($people->getAttributes());
            $bk_people->save();
            $result = true;
        } catch (\Throwable $th) {
            //throw $th;
        }
        printf("cambia informacion de firstname: ".$people_ant->firstname." a ".$bk_people->firstname."- Modificado por userid: ".auth()->user()->id);
        return $result;
    }

    public static function execInsert($peopleService)
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
            $bk_people = new BK_People();
            /*$bk_people->id = $people->id;
            $bk_people->firstname = $peopleService->firstname;
            $bk_people->lastname = $peopleService->lastname;
            $bk_people->birthdate = $peopleService->birthdate;
            $bk_people->created_by = auth()->user()->id;*/
            $bk_people->fill($people->getAttributes());
            $bk_people->save();
            //$bk_people = BK_People::create($people);
            //$bk_people->save();
            //$array = (array) $peopleService;
            /*$array = json_decode(json_encode($peopleService), true);
            $insertPeople = DB::select(
                'call insert_people(?,?,?,?,?,?,?)',
                array(
                    $people->firstname,
                    "demostracion",
                    "2020-02-01",
                    1,
                    1,
                    "2020-02-01",
                    "2020-02-01",
                )
            );*/
            printf($bk_people->id."-".$bk_people->created_by."-".auth()->user()->id);
            $result = true;
        } catch (\Throwable $th) {
            //throw $th;
        }
        //printf($array."-".auth()->user()->id);
        return $result;
    }

}