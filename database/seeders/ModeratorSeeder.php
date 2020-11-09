<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class ModeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create([
            'role' => 2 ,
        ]);
    }
}
