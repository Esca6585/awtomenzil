<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Driver;

use Carbon\Carbon;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<10; $i++){
            Driver::create([
                'ady' => 'Çarymyrat',
                'familiyasy' => 'Amanow',
                'atasynyn_ady' => 'Meredowiç',
                'tabel_belgisi' => mt_rand(1000,9999),
                'doglan_guni' => date('d.m.y'),
                'doglan_yeri' => 'Ahal welaýatynyň Babadaýhan etrabynyň Zähmet obasy',
                'bilimi' => 'orta',
                'pasport_belgisi' => 'I-AH ' . mt_rand(100000,999999),
                'pasport_alynan_yeri' => 'Ahal welaýatynyň Babadaýhan etrap PB',
                'pasport_alynan_wagty' => date('d.m.y'),
                'telefon_belgisi' => '+993' . mt_rand(61, 65) . '-' . mt_rand(10, 99) . '-' . mt_rand(10, 99) . '-' . mt_rand(10, 99),
                'yashayan_salgysy' => 'Ahal welaýatynyň Babadaýhan etrabynyň Zähmet obasy',
                'suraty' => 'uploads/suruji.png',
                'user_id' => mt_rand(1,9),
            ]);

            Driver::create([
                'ady' => 'Ysmaýyl',
                'familiyasy' => 'Begmyradow',
                'atasynyn_ady' => 'Orazmuhammedowiç',
                'tabel_belgisi' => mt_rand(1000,9999),
                'doglan_guni' => date('d.m.y'),
                'doglan_yeri' => 'Aşgabat şäheri',
                'bilimi' => 'ýokary',
                'pasport_belgisi' => 'I-AŞ ' . mt_rand(100000,999999),
                'pasport_alynan_yeri' => 'Aşgabat şäheriniň Azatlyk etrap häkimligi',
                'pasport_alynan_wagty' => date('d.m.y'),
                'telefon_belgisi' => '+993' . mt_rand(61, 65) . '-' . mt_rand(10, 99) . '-' . mt_rand(10, 99) . '-' . mt_rand(10, 99),
                'yashayan_salgysy' => 'Aşgabat şäheri, A.Jallyýew köçesi, jaý 71',
                'suraty' => 'uploads/suruji.png',
                'user_id' => mt_rand(1,9),
            ]);

            Driver::create([
                'ady' => 'Kakamyrat',
                'familiyasy' => 'Gajyýew',
                'atasynyn_ady' => 'Annanurowiç',
                'tabel_belgisi' => mt_rand(1000,9999),
                'doglan_guni' => date('d.m.y'),
                'doglan_yeri' => 'Balkan welaýatynyň Magtymguly şäheri',
                'bilimi' => 'orta',
                'pasport_belgisi' => 'I-BN ' . mt_rand(100000,999999),
                'pasport_alynan_yeri' => 'Aşgabat şäheriniň Abadan etrap häkimligi',
                'pasport_alynan_wagty' => date('d.m.y'),
                'telefon_belgisi' => '+993' . mt_rand(61, 65) . '-' . mt_rand(10, 99) . '-' . mt_rand(10, 99) . '-' . mt_rand(10, 99),
                'yashayan_salgysy' => 'Aşgabat şäheriniň Watutina köçesiniň 1-nji geçelgesiniň 14/1 jaýy',
                'suraty' => 'uploads/suruji.png',
                'user_id' => mt_rand(1,9),
            ]);

            Driver::create([
                'ady' => 'Mergen',
                'familiyasy' => 'Atageldiýew',
                'atasynyn_ady' => 'Myratgeldiýewiç',
                'tabel_belgisi' => mt_rand(1000,9999),
                'doglan_guni' => date('d.m.y'),
                'doglan_yeri' => 'Lebap welaýatynyň Atamyrat etrabynyň Gyzylaýak obasy',
                'bilimi' => 'ýokary',
                'pasport_belgisi' => 'I-LB ' . mt_rand(100000,999999),
                'pasport_alynan_yeri' => 'Ahal welaýat Ruhabat etrap häkimligi',
                'pasport_alynan_wagty' => date('d.m.y'),
                'telefon_belgisi' => '+993' . mt_rand(61, 65) . '-' . mt_rand(10, 99) . '-' . mt_rand(10, 99) . '-' . mt_rand(10, 99),
                'yashayan_salgysy' => 'Ahal welaýaty,Ak bugdaý etraby,Bugdaýly obasy,Ş.Batyrow köçesi,jaý 4, öý 1',
                'suraty' => 'uploads/suruji.png',
                'user_id' => mt_rand(1,9),
            ]);

        }

        
    }
}
