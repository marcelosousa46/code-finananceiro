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
        factory(\CodeFin\Models\User::class,1)
                ->states('admin')
                ->create([
                    'name' => 'Luiz Carlos',
                    'email' => 'admin@user.com'
                ]);
        
        factory(\CodeFin\Models\User::class,1)
                ->create([
                    'name' => 'Jose Luiz',
                    'email' => 'client@user.com'
                ]);
    }
}
