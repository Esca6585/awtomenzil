<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<10; $i++){
            Car::create([
                'awtoulagyn_kysymy' => 'Toýota',
                'awtoulagyn_gornushi' => 'Corolla',
                'awtoulogyn_shahsy_belgisi' => mt_rand(19,22) . mt_rand(10,99) . ' AGG',
                'cykan_yyly' => mt_rand(2016,2020),
                'win_kody' => Str::upper(uniqid() . uniqid()),
                'user_id' => 1,
            ]);

            Car::create([
                'awtoulagyn_kysymy' => 'Hyundai',
                'awtoulagyn_gornushi' => 'Elantra',
                'awtoulogyn_shahsy_belgisi' => mt_rand(19,22) . mt_rand(10,99) . ' AGG',
                'cykan_yyly' => mt_rand(2016,2020),
                'win_kody' => uniqid() . uniqid(),
                'user_id' => 1,
            ]);

            Car::create([
                'awtoulagyn_kysymy' => 'Toýota',
                'awtoulagyn_gornushi' => 'Hiace',
                'awtoulogyn_shahsy_belgisi' => mt_rand(19,22) . mt_rand(10,99) . ' AGG',
                'cykan_yyly' => mt_rand(2016,2020),
                'win_kody' => Str::upper(uniqid() . uniqid()),
                'user_id' => 1,
            ]);

            Car::create([
                'awtoulagyn_kysymy' => 'Folkswagen',
                'awtoulagyn_gornushi' => '',
                'awtoulogyn_shahsy_belgisi' => mt_rand(19,22) . mt_rand(10,99) . ' AGB',
                'cykan_yyly' => mt_rand(2016,2020),
                'win_kody' => Str::upper(uniqid() . uniqid()),
                'user_id' => 1,
            ]);
        }
    }
}
