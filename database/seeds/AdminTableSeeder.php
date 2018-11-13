<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('admin')->insert([
            'first_name' => 'admin',
            'last_name'  => 'admin',
            'phone'      => '98658965',
            'status'     => '1',           
            'email'      => 'admin@gmail.com',
            'password'   => 'admin123',
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s'),
        ]);
    }
}
