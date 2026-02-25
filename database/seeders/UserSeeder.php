<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   

        $user = [
            'name' => 'Eduardo Ferraz',
            'email' => 'eduardo.ferraz@usp.br',
            'codpes' => '123456789',
            'password' => bcrypt('password'),
        ]; 
        User::create($user);

        $users = User::factory()->count(10)->create();
    }
}
