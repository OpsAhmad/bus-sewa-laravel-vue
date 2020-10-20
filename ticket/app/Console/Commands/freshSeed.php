<?php

namespace App\Console\Commands;

use Database\Seeders\BusesSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Console\Command;

class freshSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'freshSeed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fresh and Seeder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('wait a minute');
        $this->call('migrate:fresh');
        $this->call(UserSeeder::class);
        $this->call(BusesSeeder::class);
        $this->info('Done');
    }
}
