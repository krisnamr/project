<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
  
    public function run()
    {
         $user = factory(App\Admin::class)->create([
             'fullname' => 'admins',
             'jabatan' => 'staff',
             'email' => 'admin@mail.com',
             'password' => bcrypt('krisna'),
             
         ]);

        
    }
}
