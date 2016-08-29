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
        //DB::table('users')->delete();

        \App\User::create(array(
            'username' => 'firstuser',
            'name'  =>  'firstuser',
            'first_name'    =>   'Ffirstuser',
            'last_name' =>  'Lfirstuser',
            'email' => 'firstuser@firstuser.com',
            'password' => Hash::make('firstuser'),
        ));

        \App\User::create(array(
            'username' => 'seconduser',
            'name'  =>   'seconduser',
            'first_name'    =>  'Fseconduser',
            'last_name' =>  'Lseconduser',
            'email' =>  'seconduser@seconduser.com',
            'password' => Hash::make('seconduser'),
        ));
    }
}
