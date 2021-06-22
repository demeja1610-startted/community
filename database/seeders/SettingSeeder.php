<?php

namespace Database\Seeders;

use App\Enum\SettingsEnum;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rawSettings = SettingsEnum::values();

        foreach($rawSettings as $key => $value) {
            $setting = new Setting([
                'slug' => $key,
                'value' => $value,
            ]);
            $setting->save();
        }
    }
}
