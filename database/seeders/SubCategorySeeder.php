<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subCategories = [
            // Subcategories for Engine parts
            ['name' => 'starter motor','image' => 'images/engine_parts.jpg', 'category_id' => 1],
            ['name' => 'crankshaft','image' => 'images/engine_parts.jpg', 'category_id' => 1],
            ['name' => 'camshaft','image' => 'images/engine_parts.jpg', 'category_id' => 1],
            ['name' => 'Timing belt and chain','image' => 'images/engine_parts.jpg', 'category_id' => 1],
            ['name' => 'Cylinder Head','image' => 'images/engine_parts.jpg', 'category_id' => 1],
            ['name' => 'Oil pump','image' => 'images/engine_parts.jpg', 'category_id' => 1],
            ['name' => 'Fuel injector','image' => 'images/engine_parts.jpg', 'category_id' => 1],

            // Subcategories for Transmission and drivetrain
            ['name' => 'Gear box','image' => 'images/engine_parts.jpg', 'category_id' => 2],
            ['name' => 'Clutch kit','image' => 'images/engine_parts.jpg', 'category_id' => 2],
            ['name' => 'Driveshaft','image' => 'images/engine_parts.jpg', 'category_id' => 2],
            ['name' => 'Torque converter','image' => 'images/engine_parts.jpg', 'category_id' => 2],
            ['name' => 'Differential','image' => 'images/engine_parts.jpg', 'category_id' => 2],
            ['name' => 'joints','image' => 'images/engine_parts.jpg', 'category_id' => 2],
            ['name' => 'Fly wheel','image' => 'images/engine_parts.jpg', 'category_id' => 2],
            ['name' => 'Transmission mounts','image' => 'images/engine_parts.jpg', 'category_id' => 2],

            // Subcategories for Suspension and Steering
            ['name' => 'Shock absorber and spring','image' => 'images/engine_parts.jpg', 'category_id' => 3],
            ['name' => 'power steering racks','image' => 'images/engine_parts.jpg', 'category_id' => 3],
            ['name' => 'control arm','image' => 'images/engine_parts.jpg', 'category_id' => 3],
            ['name' => 'sway bar','image' => 'images/engine_parts.jpg', 'category_id' => 3],
            ['name' => 'ball joint','image' => 'images/engine_parts.jpg', 'category_id' => 3],
            ['name' => 'wheel hubs','image' => 'images/engine_parts.jpg', 'category_id' => 3],

            // Subcategories for Brake System
            ['name' => 'Brake dics and pads','image' => 'images/engine_parts.jpg', 'category_id' => 4],
            ['name' => 'brake caliper','image' => 'images/engine_parts.jpg', 'category_id' => 4],
            ['name' => 'brake line and brake drum','image' => 'images/engine_parts.jpg', 'category_id' => 4],
            ['name' => 'brake booster','image' => 'images/engine_parts.jpg', 'category_id' => 4],
            ['name' => 'brake shoes','image' => 'images/engine_parts.jpg', 'category_id' => 4],
            ['name' => 'brake regulator','image' => 'images/engine_parts.jpg', 'category_id' => 4],
            ['name' => 'brake vacuum pump','image' => 'images/engine_parts.jpg', 'category_id' => 4],

            // Subcategories for Electrical components
            ['name' => 'alternator','image' => 'images/engine_parts.jpg', 'category_id' => 5],
            ['name' => 'Battery','image' => 'images/engine_parts.jpg', 'category_id' => 5],
            ['name' => 'Wiring Harness','image' => 'images/engine_parts.jpg', 'category_id' => 5],
            ['name' => 'ECU','image' => 'images/engine_parts.jpg', 'category_id' => 5],
            ['name' => 'alternator regulator and parts','image' => 'images/engine_parts.jpg', 'category_id' => 5],
            ['name' => 'Airbag clock springs','image' => 'images/engine_parts.jpg', 'category_id' => 5],

            // Subcategories for Sensor
            ['name' => 'Mass airflow sensor','image' => 'images/engine_parts.jpg', 'category_id' => 6],
            ['name' => 'Parking sensor','image' => 'images/engine_parts.jpg', 'category_id' => 6],
            ['name' => 'Rain sensor','image' => 'images/engine_parts.jpg', 'category_id' => 6],
            ['name' => 'Steering angel sensor','image' => 'images/engine_parts.jpg', 'category_id' => 6],
            ['name' => 'Fluid level sensor','image' => 'images/engine_parts.jpg', 'category_id' => 6],
            ['name' => 'Speed and RPM sensor','image' => 'images/engine_parts.jpg', 'category_id' => 6],
            ['name' => 'other sensors','image' => 'images/engine_parts.jpg', 'category_id' => 6],

            // Subcategories for Body parts
            ['name' => 'Bumpers','image' => 'images/engine_parts.jpg', 'category_id' => 7],
            ['name' => 'Doors','image' => 'images/engine_parts.jpg', 'category_id' => 7],
            ['name' => 'Mirrors','image' => 'images/engine_parts.jpg', 'category_id' => 7],
            ['name' => 'Hood','image' => 'images/engine_parts.jpg', 'category_id' => 7],
            ['name' => 'Trunk lid','image' => 'images/engine_parts.jpg', 'category_id' => 7],
            ['name' => 'Fenders','image' => 'images/engine_parts.jpg', 'category_id' => 7],
            ['name' => 'Grille','image' => 'images/engine_parts.jpg', 'category_id' => 7],

            // Subcategories for Interior Components
            ['name' => 'Seats','image' => 'images/engine_parts.jpg', 'category_id' => 8],
            ['name' => 'Dashboard','image' => 'images/engine_parts.jpg', 'category_id' => 8],
            ['name' => 'Carpets','image' => 'images/engine_parts.jpg', 'category_id' => 8],
            ['name' => 'Hand brakes','image' => 'images/engine_parts.jpg', 'category_id' => 8],
            ['name' => 'Steering wheel','image' => 'images/engine_parts.jpg', 'category_id' => 8],
            ['name' => 'air vent','image' => 'images/engine_parts.jpg', 'category_id' => 8],
            ['name' => 'Sun visors','image' => 'images/engine_parts.jpg', 'category_id' => 8],

            // Subcategories for Cooling System
            ['name' => 'Water Pump','image' => 'images/engine_parts.jpg', 'category_id' => 9],
            ['name' => 'Thermostats','image' => 'images/engine_parts.jpg', 'category_id' => 9],
            ['name' => 'Radiators','image' => 'images/engine_parts.jpg', 'category_id' => 9],
            ['name' => 'Cooling fan','image' => 'images/engine_parts.jpg', 'category_id' => 9],
            ['name' => 'Heater Core','image' => 'images/engine_parts.jpg', 'category_id' => 9],

            // Subcategories for Lighting System
            ['name' => 'Head light','image' => 'images/engine_parts.jpg', 'category_id' => 10],
            ['name' => 'Tail light','image' => 'images/engine_parts.jpg', 'category_id' => 10],
            ['name' => 'Turn Signal light','image' => 'images/engine_parts.jpg', 'category_id' => 10],
            ['name' => 'Daytime running light','image' => 'images/engine_parts.jpg', 'category_id' => 10],
            ['name' => 'Reverse light','image' => 'images/engine_parts.jpg', 'category_id' => 10],

            // Subcategories for Wheels and Tyres
            ['name' => 'Rims','image' => 'images/engine_parts.jpg', 'category_id' => 11],
            ['name' => 'Tyers','image' => 'images/engine_parts.jpg', 'category_id' => 11],
            ['name' => 'Hub caps','image' => 'images/engine_parts.jpg', 'category_id' => 11],

            // Subcategories for Car Detailing
            ['name' => 'Exterior care','image' => 'images/engine_parts.jpg', 'category_id' => 12],
            ['name' => 'Interior care','image' => 'images/engine_parts.jpg', 'category_id' => 12],
            ['name' => 'Glass cleaning and protection','image' => 'images/engine_parts.jpg', 'category_id' => 12],
            ['name' => 'Waxing and Polishing','image' => 'images/engine_parts.jpg', 'category_id' => 12],
            ['name' => 'Detailing tools','image' => 'images/engine_parts.jpg', 'category_id' => 12],
        ];

        DB::table('sub_categories')->insert($subCategories);
    }
}
