<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * 
     * 
     * 
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          DB::table('product')->insert([
  [
        "name" => "Elegant Evening Gown",
        "price" => "4500",
        "description" => "Look sophisticated in this elegant evening gown, designed for formal dinners, parties, and celebrations. Its timeless style adds charm to your wardrobe.",
        "category" => "women-fashion",
        "gallery" => "https://images.unsplash.com/photo-1566174053879-31528523f8ae?w=750"
    ],
    [
        "name" => "Red Party Wear Dress",
        "price" => "3500",
        "description" => "Stand out at every celebration with this beautiful party wear dress. Ideal for birthdays, festive events, date nights, and evening outings.",
        "category" => "women-fashion",
        "gallery" => "https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=750"
    ],
    [
        "name" => "Classic Red Maxi Dress",
        "price" => "2800",
        "description" => "Enjoy effortless style with this classic maxi dress. Its graceful look makes it suitable for casual outings, dinners, holidays, and special gatherings.",
        "category" => "women-fashion",
        "gallery" => "https://images.unsplash.com/photo-1539008835657-9e8e9680c956?w=750"
    ],
    [
        "name" => "Premium Designer Gown",
        "price" => "6000",
        "description" => "Elevate your occasion wear with this premium designer gown. A stylish choice for weddings, receptions, formal events, and grand celebrations.",
        "category" => "women-fashion",
        "gallery" => "https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=750"
    ],
    [
        "name" => "Floral Party Dress",
        "price" => "3200",
        "description" => "Refresh your wardrobe with this fashionable floral dress. Perfect for brunches, outings, parties, and daytime celebrations.",
        "category" => "women-fashion",
        "gallery" => "https://images.unsplash.com/photo-1483985988355-763728e1935b?w=750"
    ]
        ]);
    }
}