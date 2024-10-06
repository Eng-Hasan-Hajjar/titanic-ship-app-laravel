<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecommendationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // استرجاع جميع معرفات المستخدمين
        $userIds = DB::table('users')->pluck('id');

        // استرجاع جميع معرفات المنتجات
        $productIds = DB::table('products')->pluck('id');

        // استرجاع معرفات جميع أنواع الحسابات المختلفة
        $facebookPageIds = DB::table('facebook_pages')->pluck('id');
        $youtubeChannelIds = DB::table('you_tube_channels')->pluck('id');
        $instagramAccountIds = DB::table('instagram_accounts')->pluck('id');

        $recommendations = [];

        // توليد توصيات لحسابات Facebook
        foreach ($facebookPageIds as $facebookPageId) {
            $recommendations[] = [
                'user_id' => $userIds->random(),
                'product_id' => $productIds->random(),
                'recommendable_id' => $facebookPageId,
                'recommendable_type' => 'App\Models\FacebookPage',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // توليد توصيات لحسابات YouTube
        foreach ($youtubeChannelIds as $youtubeChannelId) {
            $recommendations[] = [
                'user_id' => $userIds->random(),
                'product_id' => $productIds->random(),
                'recommendable_id' => $youtubeChannelId,
                'recommendable_type' => 'App\Models\YouTubeChannel',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // توليد توصيات لحسابات Instagram
        foreach ($instagramAccountIds as $instagramAccountId) {
            $recommendations[] = [
                'user_id' => $userIds->random(),
                'product_id' => $productIds->random(),
                'recommendable_id' => $instagramAccountId,
                'recommendable_type' => 'App\Models\InstagramAccount',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('recommendations')->insert($recommendations);
    }
}
