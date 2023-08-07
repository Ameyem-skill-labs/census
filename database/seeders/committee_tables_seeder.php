<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommitteesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Committee Categories
        $committeeCategories = [
            ['name' => 'తొగటవీర క్షత్రియ కుల సంఘం'],
            ['name' => 'ప్రభుత్వ సంఘం'],
            ['name' => 'ప్రభుత్వ గుర్తింపు పొందిన సంఘం'],
            ['name' => 'ప్రైవేటు సంఘం'],
            ['name' => 'ఇతర']
        ];

        // Inserting Committee Categories
        DB::table('committee_categories')->insert($committeeCategories);

        // Committee Types
        $committeeTypes = [
            ['name' => 'జాతీయ సంఘం'],
            ['name' => 'రాష్ట్ర సంఘం'],
            ['name' => 'జిల్లా సంఘం'],
            ['name' => 'మండల సంఘం'],
            ['name' => 'గ్రామ సంఘం'],
            ['name' => 'చౌడేశ్వరి ఆలయ సంఘం']
        ];

        // Inserting Committee Types
        DB::table('committee_types')->insert($committeeTypes);

        // Committee Sub Categories
        $committeeSubCategories = [
            ['name' => 'ప్రధాన సంఘం'],
            ['name' => 'మహిళా సంఘం'],
            ['name' => 'యువజన సంఘం']
        ];

        // Inserting Committee Sub Categories
        DB::table('committee_sub_categories')->insert($committeeSubCategories);

        // Committee Positions
        $committeePositions = [
            ['name' => 'అధ్యక్షులు'],
            ['name' => 'ప్రధాన కార్యదర్శి'],
            ['name' => 'కోశాధికారి'],
            ['name' => 'ఉపాధ్యక్షులు'],
            ['name' => 'గౌరవ అధ్యక్షులు'],
            ['name' => 'సంయుక్త కార్యదర్శి'],
            ['name' => 'సభ్యుడు'],
            ['name' => 'సలహాదారు'],
            ['name' => 'గౌరవ సలహాదారు'],
        ];
        // Inserting Committee Sub Categories
        DB::table('committee_position_names')->insert($committeePositions);
    }
}