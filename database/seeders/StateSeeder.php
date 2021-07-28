<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::insert([
            ['name' => 'AC'],
            ['name' => 'AL'],
            ['name' => 'AP'],
            ['name' => 'AM'],
            ['name' => 'BA'],
            ['name' => 'CE'],
            ['name' => 'DF'],
            ['name' => 'ES'],
            ['name' => 'GO'],
            ['name' => 'MA'],
            ['name' => 'MT'],
            ['name' => 'MS'],
            ['name' => 'MG'],
            ['name' => 'PA'],
            ['name' => 'PB'],
            ['name' => 'PR'],
            ['name' => 'PE'],
            ['name' => 'PI'],
            ['name' => 'RJ'],
            ['name' => 'RN'],
            ['name' => 'RS'],
            ['name' => 'RO'],
            ['name' => 'RR'],
            ['name' => 'SC'],
            ['name' => 'SP'],
            ['name' => 'SE'],
            ['name' => 'TO']
        ]);
    }
}
