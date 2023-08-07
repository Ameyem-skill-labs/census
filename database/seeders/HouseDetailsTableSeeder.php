<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HouseDetails\hd_floor_material;
use App\Models\HouseDetails\hd_wall_material;
use App\Models\HouseDetails\hd_roof_material;
use App\Models\HouseDetails\hd_house_condition;
use App\Models\HouseDetails\hd_house_usefulness;
use App\Models\HouseDetails\hd_ownership_with_hoh;
use App\Models\HouseDetails\hd_source_drinking_water;
use App\Models\HouseDetails\hd_availed_powerconnection;
use App\Models\HouseDetails\hd_latrine_type;
use App\Models\HouseDetails\hd_waste_water_outlet;
use App\Models\HouseDetails\hd_bathing_facility;
use App\Models\HouseDetails\hd_lpg_cng_connection;
use App\Models\HouseDetails\hd_main_fuel_cooking;
use App\Models\HouseDetails\hd_smart_phone_availability;
use App\Models\HouseDetails\hd_tv_availability;
use App\Models\HouseDetails\hd_computer_availability;
use App\Models\HouseDetails\hd_broadband_availability;
use App\Models\HouseDetails\hd_telephone_availability;
use App\Models\HouseDetails\hd_twowheeler_availability;
use App\Models\HouseDetails\hd_auto_availability;
use App\Models\HouseDetails\hd_fourwheeler_availability;
use App\Models\HouseDetails\hd_tractor_availability;
use App\Models\HouseDetails\hd_lorry_bus_availability;
use App\Models\HouseDetails\hd_main_cereal_used;
use App\Models\HouseDetails\hd_owns_business;
use App\Models\HouseDetails\hd_type_of_business;
use App\Models\HouseDetails\hd_owns_maggam;


class HouseDetailsTableSeeder extends Seeder
{
    public function run()
    { 
    
        /**
        * hd_floor_material
        */
        $items = [ 
          ['id' => 1, 'name' => 'granite_marble', 'label' => 'Granite/Marble'], 
          ['id' => 2, 'name' => 'limestone', 'label' => 'Lime Stone'], 
          ['id' => 3, 'name' => 'cement', 'label' => 'Cement Gatchu'], 
          ['id' => 4, 'name' => 'soil', 'label' => 'Soil'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_floor_material::create($item);
        }    
        
    
        /**
        * hd_wall_material
        */
        $items = [ 
          ['id' => 1, 'name' => 'cement_wall', 'label' => 'Cement wall'], 
          ['id' => 2, 'name' => 'rockwall', 'label' => 'Rock wall'], 
          ['id' => 3, 'name' => 'soil', 'label' => 'Soil/Grass'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_wall_material::create($item);
        }    
        
    
        /**
        * hd_roof_material
        */
        $items = [ 
          ['id' => 1, 'name' => 'slab', 'label' => 'Slab'], 
          ['id' => 2, 'name' => 'roof_tiles', 'label' => 'Roof Tiles'], 
          ['id' => 3, 'name' => 'cement_rekulu', 'label' => 'Cement Rekulu'], 
          ['id' => 4, 'name' => 'iron_rekulu', 'label' => 'Iron Rekulu'], 
          ['id' => 5, 'name' => 'matti_roof', 'label' => 'Mixture of Lime&Gud'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_roof_material::create($item);
        }    
        
    
        /**
        * hd_house_condition
        */
        $items = [ 
          ['id' => 1, 'name' => 'new', 'label' => 'New/Good condition'], 
          ['id' => 2, 'name' => 'old', 'label' => 'Old/Bad condition'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_house_condition::create($item);
        }    
        
    
        /**
        * hd_house_usefulness
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_house_usefulness::create($item);
        }    
        
    
        /**
        * hd_ownership_with_hoh
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_ownership_with_hoh::create($item);
        }    
        
    
        /**
        * hd_source_drinking_water
        */
        $items = [ 
          ['id' => 1, 'name' => 'bore_well', 'label' => 'Bore Well'], 
          ['id' => 2, 'name' => 'tank_water', 'label' => 'Tank Water'], 
          ['id' => 3, 'name' => 'pipeline_water', 'label' => 'Pipeline Water'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_source_drinking_water::create($item);
        }    
        
    
        /**
        * hd_availed_powerconnection
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_availed_powerconnection::create($item);
        }    
        
    
        /**
        * hd_latrine_type
        */
        $items = [ 
          ['id' => 1, 'name' => 'pit', 'label' => 'Pit Latrine'], 
          ['id' => 2, 'name' => 'vantilated', 'label' => 'Ventilated Improved Pit'], 
          ['id' => 3, 'name' => 'flush', 'label' => 'Flush type'], 
          ['id' => 4, 'name' => 'shared_btwn_many', 'label' => 'Facilities shared between many'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_latrine_type::create($item);
        }    
        
    
        /**
        * hd_waste_water_outlet
        */
        $items = [ 
          ['id' => 1, 'name' => 'no_proper_outlet', 'label' => 'No Proper Outlet'], 
          ['id' => 2, 'name' => 'open_canals', 'label' => 'Open Canals'], 
          ['id' => 3, 'name' => 'closed_outlet', 'label' => 'Closed Outlets'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_waste_water_outlet::create($item);
        }    
        
    
        /**
        * hd_bathing_facility
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_bathing_facility::create($item);
        }    
        
    
        /**
        * hd_lpg_cng_connection
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_lpg_cng_connection::create($item);
        }    
        
    
        /**
        * hd_main_fuel_cooking
        */
        $items = [ 
          ['id' => 1, 'name' => 'lpg_cng', 'label' => 'LPG/CNG'], 
          ['id' => 2, 'name' => 'kalapa', 'label' => 'Vanta Kalapa'], 
          ['id' => 3, 'name' => 'dung_cake', 'label' => 'Dung Cakes'], 
          ['id' => 4, 'name' => 'electric_stove', 'label' => 'Electric stove'], 
          ['id' => 5, 'name' => 'kerocine_stove', 'label' => 'Kerocine stove'], 
          ['id' => 6, 'name' => 'bio_gas', 'label' => 'Biogas'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_main_fuel_cooking::create($item);
        }    
        
    
        /**
        * hd_smart_phone_availability
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_smart_phone_availability::create($item);
        }    
        
    
        /**
        * hd_tv_availability
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_tv_availability::create($item);
        }    
        
    
        /**
        * hd_computer_availability
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_computer_availability::create($item);
        }    
        
    
        /**
        * hd_broadband_availability
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_broadband_availability::create($item);
        }    
        
    
        /**
        * hd_telephone_availability
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_telephone_availability::create($item);
        }    
        
    
        /**
        * hd_twowheeler_availability
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_twowheeler_availability::create($item);
        }    
        
    
        /**
        * hd_auto_availability
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_auto_availability::create($item);
        }    
        
    
        /**
        * hd_fourwheeler_availability
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_fourwheeler_availability::create($item);
        }    
        
    
        /**
        * hd_tractor_availability
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_tractor_availability::create($item);
        }    
        
    
        /**
        * hd_lorry_bus_availability
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_lorry_bus_availability::create($item);
        }    
        
    
        /**
        * hd_main_cereal_used
        */
        $items = [ 
          ['id' => 1, 'name' => 'rice', 'label' => 'Rice'], 
          ['id' => 2, 'name' => 'atta', 'label' => 'Atta'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_main_cereal_used::create($item);
        }    
        
    
        /**
        * hd_owns_business
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_owns_business::create($item);
        }    
        
    
        /**
        * hd_type_of_business
        */
        $items = [ 
          ['id' => 1, 'name' => 'micro', 'label' => 'Small/Kirana/Cloaths Shop'], 
          ['id' => 2, 'name' => 'medium', 'label' => 'Medium/1 Crore turnover'], 
          ['id' => 3, 'name' => 'big', 'label' => 'Big/Above 10 crore'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_type_of_business::create($item);
        }    
        
    
        /**
        * hd_owns_maggam
        */
        $items = [ 
          ['id' => 1, 'name' => 'yes', 'label' => 'Yes'], 
          ['id' => 2, 'name' => 'no', 'label' => 'No'], 
          ];
        foreach ($items as $item) {
            \App\Models\HouseDetails\hd_owns_maggam::create($item);
        }    
        
        }
}