<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class YouTubeChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // استرجاع جميع معرفات الفئات الموجودة
        $categoryIds = DB::table('categories')->pluck('id');

        $youTubeChannels = [];

        for ($i = 1; $i <= 50; $i++) { // إدخال 50 قناة YouTube افتراضية
            $youTubeChannels[] = [
                'name' => 'YouTube Channel ' . $i,
                'url' => 'https://www.youtube.com/channel/UC' . Str::random(10),
                'description' => 'This is the description for YouTube channel ' . $i,
                'subscribers_count' => rand(1000, 1000000), // عدد مشتركين عشوائي
                'category_id' => $categoryIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('you_tube_channels')->insert($youTubeChannels);
    }
}
