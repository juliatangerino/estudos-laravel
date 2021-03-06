<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Client::factory()
       ->count(5)
       ->state(\App\Models\Client::TYPE_INDIVIDUAL)
       ->create();

       Client::factory()
       ->count(5)
       ->state(\App\Models\Client::TYPE_LEGAL)
       ->create();
    }
}
