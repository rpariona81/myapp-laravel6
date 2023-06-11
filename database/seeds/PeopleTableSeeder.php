<?php

use Illuminate\Database\Seeder;
use App\Models\People;
use App\Models\BK_People;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $people = new People();
        $people->firstname = 'Miguel';
        $people->lastname = 'Mateos';
        $people->birthdate = '1981-05-26';
        $people->created_by = '1';
        $people->save();
        $bk_people = new BK_People();
        $bk_people->fill($people->getAttributes());
        $bk_people->save();
    }
}
