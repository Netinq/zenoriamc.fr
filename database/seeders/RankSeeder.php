<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rank;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rank::firstOrCreate(['power' => '0',    'name' => 'Joueur',         'color' => '#AAAAAA']);
        Rank::firstOrCreate(['power' => '10',   'name' => 'Specialiste',    'color' => '#55FF55']);
        Rank::firstOrCreate(['power' => '20',   'name' => 'Ancien',         'color' => '#55FF55']);
        Rank::firstOrCreate(['power' => '30',   'name' => 'VIP',            'color' => '#55FF55']);
        Rank::firstOrCreate(['power' => '40',   'name' => 'Premium',        'color' => '#FFFF55']);
        Rank::firstOrCreate(['power' => '50',   'name' => 'Master',         'color' => '#FF55FF']);
        Rank::firstOrCreate(['power' => '60',   'name' => 'Astral',         'color' => '#AA00AA']);
        Rank::firstOrCreate(['power' => '70',   'name' => 'Flash',          'color' => '#48BBE8']);
        Rank::firstOrCreate(['power' => '110',  'name' => 'Ambassadeur',    'color' => '#FFAA00']);
        Rank::firstOrCreate(['power' => '120',  'name' => 'Vidéaste',       'color' => '#FFAA00']);
        Rank::firstOrCreate(['power' => '210',  'name' => 'Staff',          'color' => '#00AA00']);
        Rank::firstOrCreate(['power' => '220',  'name' => 'Constructeur',   'color' => '#FFAA00']);
        Rank::firstOrCreate(['power' => '230',  'name' => 'Développeur',    'color' => '#FFAA00']);
        Rank::firstOrCreate(['power' => '310',  'name' => 'Assistant',      'color' => '#FF5555']);
        Rank::firstOrCreate(['power' => '320',  'name' => 'Modérateur',     'color' => '#FF5555']);
        Rank::firstOrCreate(['power' => '410',  'name' => 'Responsable',    'color' => '#AA0000']);
        Rank::firstOrCreate(['power' => '420',  'name' => 'Administrateur', 'color' => '#AA0000']);
    }
}
