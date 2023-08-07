
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //  public function up()
    //  { 
//         Schema::create('HouseDetails', function (Blueprint $table) {
//         $table->id();     
//         $table->string('wardno');
//         $table->string('buildingno',20);
//         $table->string('houseno',40);
//         $table->tinyInteger('floor_material_id');
//         $table->tinyInteger('wall_material_id');
//         $table->tinyInteger('roof_material_id');
//         $table->tinyInteger('house_condition_id');
//         $table->tinyInteger('house_usefulness_id');
//         $table->tinyInteger('no_persons_belongs');
//         $table->tinyInteger('no_persons_outside');
//         $table->integer('name_hoh');
//         $table->tinyInteger('ownership_with_hoh_id');
//         $table->integer('no_rooms');
//         $table->integer('no_marride_couple');
//         $table->tinyInteger('source_drinking_water_id');
//         $table->tinyInteger('availed_powerconnection_id');
//         $table->tinyInteger('latrine_type_id');
//         $table->tinyInteger('waste_water_outlet_id');
//         $table->tinyInteger('bathing_facility_id');
//         $table->tinyInteger('lpg_cng_connection_id');
//         $table->tinyInteger('main_fuel_cooking_id');
//         $table->tinyInteger('smart_phone_availability_id');
//         $table->tinyInteger('tv_availability_id');
//         $table->tinyInteger('computer_availability_id');
//         $table->tinyInteger('broadband_availability_id');
//         $table->tinyInteger('telephone_availability_id');
//         $table->tinyInteger('twowheeler_availability_id');
//         $table->tinyInteger('auto_availability_id');
//         $table->tinyInteger('fourwheeler_availability_id');
//         $table->tinyInteger('tractor_availability_id');
//         $table->tinyInteger('lorry_bus_availability_id');
//         $table->tinyInteger('main_cereal_used_id');
//         $table->tinyInteger('owns_business_id');
//         $table->tinyInteger('type_of_business_id');
//         $table->tinyInteger('owns_maggam_id');
//         $table->string('acre_agri_land');
// });
     
//     Schema::create('hd_floor_materials', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_wall_materials', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_roof_materials', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
    
         
//     Schema::create('hd_house_usefulnesses', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });

//     Schema::create('hd_house_conditions', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_ownership_with_hohs', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_source_drinking_waters', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_availed_powerconnections', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_latrine_types', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',50);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_waste_water_outlets', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',50);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_bathing_facilities', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',50);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_lpg_cng_connections', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_main_fuel_cookings', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_smart_phone_availabilities', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_tv_availabilities', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_computer_availabilities', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_broadband_availabilities', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_telephone_availabilities', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_twowheeler_availabilities', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_auto_availabilities', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_fourwheeler_availabilities', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_tractor_availabilities', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_lorry_bus_availabilities', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_main_cereal_useds', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_owns_businesses', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_type_of_businesses', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',50);
//         $table->timestamps();
//     });
         
//     Schema::create('hd_owns_maggams', function (Blueprint $table) {
//         $table->id();
//         $table->string('name',120);
//         $table->string('label',20);
//         $table->timestamps();
//     });
    
//     }


    public function down()
    {
        
        Schema::dropIfExists('HouseDetails');
    Schema::dropIfExists('hd_floor_materials');
    
    Schema::dropIfExists('hd_wall_materials');
    
    Schema::dropIfExists('hd_roof_materials');
    
    Schema::dropIfExists('hd_house_conditions');
    
    Schema::dropIfExists('hd_house_usefulnesses');
    
    Schema::dropIfExists('hd_ownership_with_hohs');
    
    Schema::dropIfExists('hd_source_drinking_waters');
    
    Schema::dropIfExists('hd_availed_powerconnections');
    
    Schema::dropIfExists('hd_latrine_types');
    
    Schema::dropIfExists('hd_waste_water_outlets');
    
    Schema::dropIfExists('hd_bathing_facilities');
    
    Schema::dropIfExists('hd_lpg_cng_connections');
    
    Schema::dropIfExists('hd_main_fuel_cookings');
    
    Schema::dropIfExists('hd_smart_phone_availabilities');
    
    Schema::dropIfExists('hd_tv_availabilities');
    
    Schema::dropIfExists('hd_computer_availabilities');
    
    Schema::dropIfExists('hd_broadband_availabilities');
    
    Schema::dropIfExists('hd_telephone_availabilities');
    
    Schema::dropIfExists('hd_twowheeler_availabilities');
    
    Schema::dropIfExists('hd_auto_availabilities');
    
    Schema::dropIfExists('hd_fourwheeler_availabilities');
    
    Schema::dropIfExists('hd_tractor_availabilities');
    
    Schema::dropIfExists('hd_lorry_bus_availabilities');
    
    Schema::dropIfExists('hd_main_cereal_useds');
    
    Schema::dropIfExists('hd_owns_businesses');
    
    Schema::dropIfExists('hd_type_of_businesses');
    
    Schema::dropIfExists('hd_owns_maggams');
    
    }
};
