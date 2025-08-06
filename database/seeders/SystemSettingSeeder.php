<?php

namespace Database\Seeders;

use App\Models\SystemSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemSetting::create([
            'title' => 'medi',
            'system_name' => 'medi',
            'email' => 'info@medi.com',
            'number' => '5873515720',
            'logo' => null,
            'favicon' => null,
            'address' => null,
            'copyright_text' => 'Copyright 2025. All Rights Reserved. Powered by Medi.',
            'description' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
