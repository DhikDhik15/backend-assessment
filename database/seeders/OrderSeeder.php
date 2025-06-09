<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::all();
        $products = Product::all();

        foreach ($customers as $customer) {
            foreach ($products->random(rand(1, 3)) as $product) {
                Order::create([
                    'customer_id' => $customer->id,
                    'product_id' => $product->id,
                    'total_price' => $product->price * rand(1, 5),
                ]);
            }
        }
    }
}
