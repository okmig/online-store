<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Cybertrack 100 26" Electric Bike',
            'description' => '3 Hours Fast Charge, BAFANG 350W Brushless Motor, 36V/10.4Ah Removable Lithium-Ion Battery, Electric Mountain Bike with Shimano 21-Speed and Suspension Fork',
            'price' => '799.99',
            'quantity' => '4',
        ]);
        Product::create([
            'name' => 'ANCHEER Electric Bike',
            'description' => 'Electric Mountain Bike 350W Ebike 26 Electric Bicycle, 20MPH Adults Ebike with Removable 10.4Ah Battery, Professional 21 Speed Gears',
            'price' => '689.99',
            'quantity' => '7',
        ]);
        Product::create([
            'name' => 'Segway Ninebot E22 E45',
            'description' => 'Electric Kick Scooter, Upgraded Motor Power, 9-inch Dual Density Tires, Lightweight and Foldable',
            'price' => '549.99',
            'quantity' => '3',
        ]);
        Product::create([
            'name' => 'Heybike Mars',
            'description' => 'Electric Bike Foldable 20" x 4.0 Fat Tire Electric Bicycle with 500W Motor, 48V 12.5AH Removable Battery, Shimano 7-Speed and Dual Shock Absorber for Adults',
            'price' => '999.99',
            'quantity' => '10',
        ]);

        Category::create([
            'name' => 'bikes',
        ]);
        Category::create([
            'name' => 'scooters',
        ]);

        Discount::create([
            'name' => 'Summer discount',
            'discount' => '10.5',
            'status' => '1',
        ]);
        Discount::create([
            'name' => 'Special discount',
            'discount' => '50',
            'status' => '0',
        ]);
    }
}
