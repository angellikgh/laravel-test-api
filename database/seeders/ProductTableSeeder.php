<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "sku" => "000001",
                "name" => "Full coverage insurance",
                "category" => "insurance",
                "price" => 89000
            ],
            [
                "sku" => "000002",
                "name" => "Compact Car X3",
                "category" => "vehicle",
                "price" => 99000
            ],
            [
                "sku" => "000003",
                "name" => "SUV Vehicle, high end",
                "category" => "vehicle",
                "price" => 150000
            ],
            [
                "sku" => "000004",
                "name" => "Basic coverage",
                "category" => "insurance",
                "price" => 20000
            ],
            [
                "sku" => "000005",
                "name" => "Convertible X2, Electric",
                "category" => "vehicle",
                "price" => 250000
            ]
        ];

        Product::insert($products);
    }
}
