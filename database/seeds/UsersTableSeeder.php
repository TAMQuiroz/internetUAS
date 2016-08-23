<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('Usuario')->insert([
            'Usuario' => 'admin',
            'Contrasena' => bcrypt('secret'),
        ]);
    }
}
