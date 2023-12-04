<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\Notifications;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 5; $i++) {
            
            Notification::create([
                'body' => $faker->paragraph,
                'type' => Str::random(5)
            ]);

    }
}
}
