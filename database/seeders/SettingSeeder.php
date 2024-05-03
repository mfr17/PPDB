<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::truncate();

        $json = File::get("database/data/settings.json");
        $countries = json_decode($json);

        foreach ($countries as $key => $value) {
            Setting::create([
                "setting_group" => $value->setting_group,
                "setting_variable" => $value->setting_variable,
                "setting_value" => $value->setting_value,
                "setting_default_value" => $value->setting_default_value,
                "setting_access_group" => $value->setting_access_group,
                "setting_description" => $value->setting_description,
                "type" => $value->type
            ]);
        }
    }
}
