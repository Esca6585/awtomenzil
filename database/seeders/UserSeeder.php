<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $emails = [
            'Awtotoplum1@gmail.com',
            'Awtotoplum2@gmail.com',
            'Awtotoplum3@gmail.com',
            'Awtotoplum4@gmail.com',
            'Awtotoplum5@gmail.com',
            'Awtotoplum6@gmail.com',
            'Awtotoplum7@gmail.com',
            'Awtotoplum8@gmail.com',
            'Awtotoplum9@gmail.com',
            'Awtotoplum10@gmail.com',
            'Awtotoplum11@gmail.com',
        ];

        User::create([
            'name' => 'Admin',
            'surname' => 'Adminow',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'autocolumn_id' => '12345',
            'image' => 'uploads/admin.jpg',
        ]);
        
        foreach($emails as $key => $email){
            User::create([
                'name' => 'Awtotoplum' . (string)($key + 1),
                'surname' => 'Awtotoplum' . (string)($key + 1) . 'ow',
                'email' => $email,
                'password' => Hash::make('password' . (string)($key + 1)),
                'autocolumn_id' => $key+1,
                'image' => 'uploads/admin.jpg',
            ]);
        }
    }
}
