<?php

namespace App\Services;

use App\Models\Instituto;
use DB;

class InstitutoService
{

    public static function getList()
    {
        $result = false;
        try {
            //code...
            //Busca en la tabla people el id a actualizar
            $list_instituto = Instituto::all();
            $result = true;
        } catch (\Throwable $th) {
            throw $th;
            return $result;
        }
        //printf("cambia informacion de firstname: ".$people_ant->firstname." a ".$bk_people->firstname."- Modificado por userid: ".auth()->user()->id);
        return $list_instituto;
    }

    public static function select($institutoService)
    {
        $result = false;
        try {
            //code...
            //Busca en la tabla people el id a actualizar
            $sel_instituto = Instituto::findOrFail($institutoService->id);
            $result = true;
        } catch (\Throwable $th) {
            throw $th;
        }
        //printf("cambia informacion de firstname: ".$people_ant->firstname." a ".$bk_people->firstname."- Modificado por userid: ".auth()->user()->id);
        if($result){
            return $sel_instituto;
        }else{
            return $result;
        };
    }

}