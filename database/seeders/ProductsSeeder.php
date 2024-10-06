<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // استرجاع جميع معرفات الفئات
         $categoryIds = DB::table('categories')->pluck('id');

             // تحقق من وجود أي فئات
             if ($categoryIds->isEmpty()) {
                $this->command->info('No categories available, skipping ProductsSeeder.');
                return;
            }

        // أمثلة على المستخدمين والفئات
        $userIds = DB::table('users')->pluck('id');
        $categoryIds = DB::table('categories')->pluck('id');

        $products = [];

        for ($i = 1; $i <= 100; $i++) { // إدخال 100 منتج افتراضي
            $products[] = [
                'user_id' => $userIds->random(),
                'category_id' => $categoryIds->random(),
                'name' => 'Product ' . $i,
                'description' => 'This is the description for product ' . $i,
                'image' => 'https://via.placeholder.com/150', // رابط افتراضي لصورة المنتج
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($products);
    }
}
