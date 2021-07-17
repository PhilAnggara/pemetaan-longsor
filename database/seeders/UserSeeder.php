<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Jenifer Damar',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Admin123'),
                'level' => 'ADMIN',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'name' => 'Brenda Damar',
                'email' => 'brendadamar@gmail.com',
                'password' => bcrypt('BrendaDamar123'),
                'level' => 'Masyarakat',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
