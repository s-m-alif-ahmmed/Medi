<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'title' => 'juxtalite®',
                'description' => 'When the venous valves become damaged, blood pools in the ankles and feet, the resulting build-up of pressure (‘venous hypertension’) causes widening of the vessels, which can become enlarged and twisted, called varicose veins. Treatment of the underlying condition at this point can reduce the risk of further development of associated complications.',
                'thumbnail' => null,
                'status' => 'Active',
            ],
        ];

        foreach ($users as $user) {
            Product::create([
                'title' => $user['title'],
                'description' => $user['description'],
                'thumbnail' => $user['thumbnail'],
                'status' => $user['status'],
            ]);
        }
    }
}
