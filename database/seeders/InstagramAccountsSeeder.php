<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstagramAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // استرجاع جميع معرفات الفئات
        $categoryIds = DB::table('categories')->pluck('id');

        $instagramAccounts = [];

        for ($i = 1; $i <= 50; $i++) {
            $instagramAccounts[] = [
                'name' => 'Instagram Account ' . $i,
                'url' => 'https://instagram.com/account_' . $i,
                'description' => 'This is a description for Instagram Account ' . $i,
                'followers_count' => rand(1000, 100000), // عدد المتابعين العشوائي
                'category_id' => $categoryIds->random(), // ربط عشوائي بفئة
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('instagram_accounts')->insert($instagramAccounts);
    }
}
