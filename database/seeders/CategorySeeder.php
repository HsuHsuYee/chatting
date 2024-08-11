<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['name' => 'Engine parts', 'image' => 'images/engine_parts.jpg'],
            ['name' => 'Transmission and drivetrain', 'image' => 'images/transmission_drivetrain.jpg'],
            ['name' => 'Suspension and Steering', 'image' => 'images/suspension_steering.jpg'],
            ['name' => 'Sensor', 'image' => 'images/sensor.jpg'],
            ['name' => 'Brake System', 'image' => 'images/brake_system.jpg'],
            ['name' => 'Electrical components', 'image' => 'images/electrical_components.jpg'],
            ['name' => 'Body parts', 'image' => 'images/body_parts.jpg'],
            ['name' => 'Interior Components', 'image' => 'images/interior_components.jpg'],
            ['name' => 'Wheels and Tyres', 'image' => 'images/wheels_tyres.jpg'],
            ['name' => 'Cooling System', 'image' => 'images/cooling_system.jpg'],
            ['name' => 'Car Detailing', 'image' => 'images/car_detailing.jpg'],
            ['name' => 'Lighting System', 'image' => 'images/lighting_system.jpg'],
        ];

        foreach ($categories as &$category) {
            $category['image'] = json_encode($category['image']); // Encode the images array to JSON
        }

        DB::table('categories')->insert($categories);
    }
}
