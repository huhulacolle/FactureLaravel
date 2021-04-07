<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class facture extends Controller
{
    public function formfacture()
    {
        $sport = DB::select('SELECT NumLigue, Sport FROM LIGUE');
        $liste = DB::select('SELECT Nomtype, NomMat, Prix FROM Prestations');
        return view('formfacture', compact('sport', 'liste'));
    }

    public function voirfacture()
    {
        $facture = DB::select('SELECT idFacture, NomSport, DateDeb, DateEcheance FROM LIGUE, Facture WHERE LIGUE.NumLigue = Facture.NumLigue');
        return view('voirfacture', compact('facture'));
    }

    public function facture()
    {
        // $maxfacture = NULL;
        // $id = DB::select('SELECT MAX(idFacture) as "idFacture" FROM Facture');
        // foreach ($id as $idata) {
        //     $maxfacture = $idata -> idFacture;
        // };
        // if ($maxfacture == NULL) {
        //     $maxfacture = 5174;
        // }
        // else {
        //     $maxfacture++;
        // }
        // return view('facture', compact('maxfacture'));
        // $DateDeb = date('Y-m-d');
        // $jour = date('d');
        // if ($jour >= 25) {
        //     $DateEcheance = date('Y-m-t', strtotime('+1 month'));
        // } else {
        //     $DateEcheance = date('Y-m-t');
        // }
        $j = 0;
        $adresse = DB::select('SELECT NomSport, Nom, Addrs, Ville, CodPost, Sport FROM LIGUE, Facture WHERE LIGUE.NumLigue = Facture.NumLigue AND idFacture = ' . $_GET['idFacture'] . '');
        $client = DB::select('SELECT idFacture, NumLigue, DateDeb, DateEcheance FROM Facture WHERE idFacture = ' . $_GET['idFacture'] . '');
        $contenu = DB::select('SELECT ContenuFacture.NomType as "ContenuFacture", NomMat, Qte, Prix FROM ContenuFacture, Facture, Prestations WHERE
        ContenuFacture.idFacture = Facture.idFacture AND ContenuFacture.NomType = Prestations.NomType AND Facture.idFacture = ' . $_GET['idFacture'] . '');
        foreach ($contenu as $contenudata) {
            $prix[$j] = ($contenudata -> Qte) * ($contenudata -> Prix);
            $j++;
        }
        $prix_total = 0;
        for ($i=0; $i < $j; $i++) {
            $prix_total = $prix_total + $prix[$i];
        }
        return view('facture', compact('adresse','client','contenu', 'prix', 'prix_total'));
    }
}
