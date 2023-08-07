<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

// use App\Models\SanghamRelated\Jurisdiction;


class SanghamSeeder extends Seeder
{
    public function run()
    {
       
    $this->call([
    JurisdictionSeeder::class,
    PositionSeeder::class,
    ]
    );
}
}