<?php

namespace Database\Seeders;

use App\Models\Options;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Options::truncate();

        $json = File::get("database/data/options.json");
        $countries = json_decode($json);

        foreach ($countries as $key => $value) {
            Options::create([
                "option_group" => $value->option_group,
                "option_name" => $value->option_name
            ]);
        }
    }
}
