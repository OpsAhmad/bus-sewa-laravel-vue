<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = collect([
            [
                'name' => 'Arifin ilham',
                'email' => 'arifin@tiket.com',
                'password' => bcrypt('12345'),
                'remember_token' => Str::random(100)
            ],
            [
                'name' => 'Muhammad alendra',
                'email' => 'alendra@ticket.com',
                'password' => bcrypt('12345'),
                'role' => 'admin',
                'remember_token' => Str::random(100)
            ],
        ]);

        $data->each(function ($data) {
            User::create($data);
        });
    }
}
