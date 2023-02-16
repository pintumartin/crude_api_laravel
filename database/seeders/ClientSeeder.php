<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $clients = User::factory()->times(250)->has(Company::factory()->hasAddress())->create();
        $clients->each->assignRole('client');
    }
}