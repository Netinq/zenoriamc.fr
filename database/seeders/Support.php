<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SupportType;

class Support extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupportType::firstOrCreate([
            'tag' => 'game',
            'title' => 'Sanctions en jeu',
            'description' => 'Je veux contester une sanction.',
        ]);

        SupportType::firstOrCreate([
            'tag' => 'discord',
            'title' => 'Sanctions sur discord',
            'description' => 'Je veux contester une sanction.',
        ]);

        SupportType::firstOrCreate([
            'tag' => 'store',
            'title' => 'Problème boutique',
            'description' => 'Divers problèmes avec la boutique.',
        ]);

        SupportType::firstOrCreate([
            'tag' => 'serveur',
            'title' => 'Problème serveur',
            'description' => 'Divers problèmes avec le service.',
        ]);

        SupportType::firstOrCreate([
            'tag' => 'other',
            'title' => 'Autre problème',
            'description' => 'Divers problèmes.',
        ]);
    }
}
