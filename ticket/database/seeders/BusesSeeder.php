<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Seeder;

class BusesSeeder extends Seeder
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
                'brand' => 'Mercedez benz',
                'driver' => 'Ahmad Wicaksono',
                'price' => 'Rp.200.000'
            ],
            [
                'brand' => 'Mitsubisi',
                'driver' => 'Ahmad Wicaksono',
                'price' => 'Rp.200.000'
            ]
        ]);

        $data->each(function ($data) {
            Bus::create($data);
        });
    }
}
