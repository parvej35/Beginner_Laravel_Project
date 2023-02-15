<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #if you want to truncate the table; Open the below line
//        DB::table('users')->delete();

        Users::create([
            'name' => 'Parvej Chowdhury',
            'email' => 'user1@mail.com',
            'password' => Crypt::encryptString('123456'),
        ]);

        Users::create([
            'name' => 'Aiyan Chowdhury',
            'email' => 'user2@mail.com',
            'password' => Crypt::encryptString('123456'),
        ]);

        Users::create([
            'name' => 'Kanij Fatema',
            'email' => 'user3@mail.com',
            'password' => Crypt::encryptString('123456'),
        ]);
    }
}
