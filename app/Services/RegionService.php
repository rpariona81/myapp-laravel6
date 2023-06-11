<?php

namespace App\Services;

use App\Models\Region;
use DB;

class RegionService
{

    public static function getList()
    {
        $result = false;
        try {
            //code...
            //Busca en la tabla people el id a actualizar
            $list_region = Region::all();
            $result = true;
        } catch (\Throwable $th) {
            throw $th;
            return $result;
        }
        //printf("cambia informacion de firstname: ".$people_ant->firstname." a ".$bk_people->firstname."- Modificado por userid: ".auth()->user()->id);
        return $list_region;
    }

    public static function select($regionService)
    {
        $result = false;
        try {
            //code...
            //Busca en la tabla people el id a actualizar
            $sel_region = Region::findOrFail($regionService->id);
            $result = true;
        } catch (\Throwable $th) {
            throw $th;
        }
        //printf("cambia informacion de firstname: ".$people_ant->firstname." a ".$bk_people->firstname."- Modificado por userid: ".auth()->user()->id);
        if($result){
            return $sel_region;
        }else{
            return $result;
        };
    }

}