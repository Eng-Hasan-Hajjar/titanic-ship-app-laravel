<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
      /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Books',
            'Clothing',
            'Home Appliances',
            'Beauty & Health',
            'Toys',
            'Sports Equipment',
            'Groceries',
            'Furniture',
            'Automotive',
            'Jewelry',
            'Footwear',
            'Accessories',
            'Office Supplies',
            'Garden & Outdoor',
            'Pet Supplies',
            'Music Instruments',
            'Art & Craft',
            'Gaming',
            'Baby Products',
            'Tools & Hardware',
            'Stationery',
            'Movies & TV',
            'Bags & Luggage',
            'Watches',
            'Mobile Phones',
            'Tablets',
            'Computers & Laptops',
            'Cameras',
            'Networking',
            'Software',
            'Kitchen Appliances',
            'Fitness Equipment',
            'Travel Accessories',
            'Personal Care',
            'Outdoor Adventure',
            'Cycling',
            'Fishing Gear',
            'Camping Gear',
            'Hiking Gear',
            'Smart Home Devices',
            'VR & AR Devices',
            'Wearable Technology',
            'Drone Technology',
            'Robotics',
            'Automobile Parts',
            'Motorsports Equipment',
            'E-books',
            'Magazines',
            'Musical CDs & DVDs'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
