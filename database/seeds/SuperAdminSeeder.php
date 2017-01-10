<?php

use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre'=>'Luis Carlos',
            'apellido'=>'Pineda',
            'email' => "luis.pineda@ceindetec.org.co",
            'password' => bcrypt('123'),
            'telefono'=>'7777777',
            'rol' => "Super",
        ]);
    }
}
