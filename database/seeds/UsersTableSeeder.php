<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Models\Client;
use CodeDelivery\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        factory(User::class)->create([
            'name' => 'Derick Felix',
            'email' => 'derickfelix4321@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'remember_token' => str_random(10)
        ])->client()->save(factory(Client::class)->make());
        factory(User::class)->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10)
        ])->client()->save(factory(Client::class)->make());

        factory(User::class, 3)->create([
            'role' => 'deliveryman',
        ]);
        factory(User::class, 10)->create()->each(function ($u) {
            $u->client()->save(factory(Client::class)->make());
        });
    }
}
