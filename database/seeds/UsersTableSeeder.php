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
         DB::table('users')->insert([
            'first_name'  => 'testing',
            'last_name'   => 'testing',
            'user_name'   => 'testing',
            'phone'       => '98423637',
            'land_line'   => '457845',
            'email'       => 'testing@gmail.com',
            'email1'      => 'testing@gmail.com',
            'email2'      => 'testing@gmail.com',
            'email3'      => 'testing@gmail.com',
            'address'     => 'madurai',
            'password'    => 'testing',
            'image'       => 'null',
            'status'      => '1',
            'email_verify'=> '1',
            'dob'         => date('Y-m-d H:i:s'),
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);
    }
}
