<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ligue;
use App\Models\prestations;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ligue::insert(array(
            array(
                'NumLigue' => 411007,
                'NomSport'=> 'Ligue Loraine de Escrime',
                'Nom' => 'Valerie LAHEURTE',
                'Addrs'=> '72 Avenue Millies Lacroix',
                'Ville' =>  'Echirolles',
                'CodPost'=> 38130,
                'Sport'=> 'Escrime',
                'Delete'=> 0,
            ),
            array(
                'NumLigue' => 411008,
                'NomSport'=> 'Ligue Loraine de Football',
                'Nom' => 'Pierre LENOIR',
                'Addrs'=> '2 Chemin Des Bateliers',
                'Ville' =>  'Annecy',
                'CodPost'=> 74000,
                'Sport'=> 'Football',
                'Delete'=> 0,
            ),
            array(
                'NumLigue' => 411009,
                'NomSport'=> 'Ligue Loraine de Basket',
                'Nom' => 'Mohamed BOURGARD',
                'Addrs'=> "99 rue de l'Epeule",
                'Ville' =>  'Rouen',
                'CodPost'=> 76100,
                'Sport'=> 'Basket',
                'Delete'=> 0,
            ),
            array(
                'NumLigue' => 411010,
                'NomSport'=> 'Ligue Loraine de Baby-Foot',
                'Nom' => 'Monsieur Sylvain Delahousse',
                'Addrs'=> '66 rue de Penthievre',
                'Ville' =>  'Privas',
                'CodPost'=> 07000,
                'Sport'=> 'Baby-Foot',
                'Delete'=> 0,
            ),
        ));
        prestations::insert(array(
            array(
                'NumPrestation' => 1,
                'Nomtype'=> 'AFFRAN',
                'NomMat' => 'Affranchissement',
                'Prix'=> 3.33,
                'Delete'=> 0,
            ),
            array(
                'NumPrestation' => 2,
                'Nomtype'=> 'PHOTOCOULEUR',
                'NomMat' => 'Photocopies couleur',
                'Prix'=> 0.24,
                'Delete'=> 0,
            ),
            array(
                'NumPrestation' => 3,
                'Nomtype'=> 'PHOTON&B',
                'NomMat' => 'Photocopies Noir et Blanc',
                'Prix'=> 0.06,
                'Delete'=> 0,
            ),
            array(
                'NumPrestation' => 4,
                'Nomtype'=> 'TRACEUR',
                'NomMat' => 'Utilisation du traceur',
                'Prix'=> 0.36,
                'Delete'=> 0,
            ),
            ),
        );

    }
}
