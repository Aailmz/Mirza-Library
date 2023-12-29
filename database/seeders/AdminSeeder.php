<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Mirza', 'role_status' => 'admin', 'email' => 'mirzaganteng@gmail.com', 'password' => Hash::make('sedapmantap123')]
        ];

        foreach ($data as $val){
            User::insert ([
                'name' => $val['name'],
                'role_status' => $val['role_status'],
                'email' => $val['email'],
                'password' => $val['password'],
            ]);
        }
    }
}
