<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new App\Models\Setting\Setting();
        $setting->website_title = 'IIlogics';
        $setting->contact_email = 'info@example.com';
        $setting->contact_number = '92333432432';
        $setting->save();
    }
}
