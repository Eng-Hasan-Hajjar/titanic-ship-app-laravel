<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacebookPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // استرجاع جميع معرفات الفئات الموجودة
        $categoryIds = DB::table('categories')->pluck('id');

        $facebookPages = [];

        for ($i = 1; $i <= 50; $i++) { // إدخال 50 صفحة فيسبوك افتراضية
            $facebookPages[] = [
                'name' => 'Facebook Page ' . $i,
                'url' => 'https://www.facebook.com/page' . $i,
                'description' => 'This is the description for Facebook page ' . $i,
                'followers_count' => rand(1000, 50000), // عدد متابعين عشوائي
                'category_id' => $categoryIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('facebook_pages')->insert($facebookPages);
    }
}
