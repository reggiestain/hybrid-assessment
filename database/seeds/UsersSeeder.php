<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // check if table users is empty
        if(DB::table('users')->get()->count() == 0){

            DB::table('users')->insert([

                [
                    'username' => 'reggiestain@gmail.com',
                    'firstname' => 'Reginald',
                    'surname' => 'Bossman',
                    'email' => 'reggiestain@gmail.com',
                    'user_group_id' =>1,
                    'password' => 'admin0123',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
