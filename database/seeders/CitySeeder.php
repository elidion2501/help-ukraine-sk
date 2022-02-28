<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countryJson = File::get("database/seeders/sk.json");
        $data = json_decode($countryJson, true);
        foreach ($data as $obj) {
            City::create([
                    'name' => $obj['city'],
                    'country' => $obj['country'],
                    'admin_name' => $obj['admin_name']
                  ]);
        }
    }
}
