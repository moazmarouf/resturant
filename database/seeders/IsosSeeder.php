<?php

namespace Database\Seeders;

use App\Models\Iso;
use Illuminate\Database\Seeder;

class IsosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $iso = new Iso();
        $iso->name = '+966';
        $iso->save();

        $iso = new Iso();
        $iso->name = '+20';
        $iso->save();
    }
}
