<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class JurisdictionSeeder extends Seeder
{
    public function run()
    {
        $jurisdictions = [
            ['jurisdiction' => 'Country', ],
            ['jurisdiction' => 'State'],
            ['jurisdiction' => 'District'],
            ['jurisdiction' => 'Mandal'],
            ['jurisdiction' => 'Village'],
            ['jurisdiction' => 'Satram'],
            ['jurisdiction' => 'Kalyana Mandapam'],
            ['jurisdiction' => 'Village Temple'],
        ];

        foreach ($jurisdictions as $jurisdiction) {

            \App\Models\SnghamRelated\Jurisdiction::create($jurisdiction);
        }
    }
}