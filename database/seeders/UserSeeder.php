<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =[
            [
                'username'=>'tantows001',
                'email'=>'tantows001@gmail.com',
                'password'=>bcrypt('123'),
                'firstName'=>'Tantowi',
                'lastName'=>'Shah'
            ],
            [
                'username'=>'shyra3104',
                'email'=>'shyra3104@gmail.com',
                'password'=>bcrypt('123'),
                'firstName'=>'Shyra',
                'lastName'=>'Athaya'
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }    
    }
}
