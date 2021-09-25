<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        if(DB::table('packages')->count() == 0){

            DB::table('packages')->insert([
                [
                    'package_name' => 'Starter',
                    'price' => 5000, 
                    'details' => "Starter package 60% ROI and 15% tax fees charge return ₦6,800.00 interest",  
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'package_name' => 'Premium',
                    'price' => 7500, 
                    'details' => "Premium package 60% ROI and 15% tax fees charge return ₦10,200.00 interest",  
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'package_name' => 'Silver',
                    'price' => 10000, 
                    'details' => "Silver package  60% ROI and 15% tax fees charge return ₦13,600.00 interest",  
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'package_name' => 'Gold',
                    'price' => 15000, 
                    'details' => "Gold package  60% ROI and 15% tax fees charge return ₦20,400.00 interest",  
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'package_name' => 'Ultimate',
                    'price' => 25000, 
                    'details' => "Ultimate package  60% ROI and 15% tax fees charge return ₦34,000.00 interest",  
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'package_name' => 'Diamond',
                    'price' => 50000, 
                    'details' => "Diamond package 60% ROI and 15% tax fees charge return ₦68,000.00 interest",  
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
              
            ]);
            
        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }
}
