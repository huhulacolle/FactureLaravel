<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class facture extends Controller
{
    public function formfacture()
    {
        $sport = DB::select('SELECT NumLigue, Sport FROM ligue WHERE Delet = 0');
        $liste = DB::select('SELECT Nomtype, NomMat, Prix FROM prestations WHERE Delet = 0');
        return view('formfacture', compact('sport', 'liste'));
    }

    public function voirfacture()
    {
        $facture = DB::select('SELECT idFacture, NomSport, DateDeb, DateEcheance FROM ligue, Facture WHERE ligue.NumLigue = facture.NumLigue');
        return view('voirfacture', compact('facture'));
    }

    public function creefacture()
    {
        $jour = date('d');
        if ($jour >= 25) {
            $DateEcheance = date('Y-m-t', strtotime('+1 month'));
        } else {
            $DateEcheance = date('Y-m-t');
        }
        $verif = DB::select('SELECT MAX(idFacture) AS idFacture FROM facture');
        foreach ($verif as $verifdata) {
            $max = $verifdata -> idFacture;
        }
        if ($max == null) {
            DB::insert('insert into facture (idFacture, NumLigue, DateDeb, DateEcheance) values (?, ?, ?, ?)', [5174 ,$_POST['NumLigue'], date('Y-m-d'), $DateEcheance]);
            $max = 5174;
        }
        else {
            DB::insert('insert into facture (NumLigue, DateDeb, DateEcheance) values (?, ?, ?)', [$_POST['NumLigue'], date('Y-m-d'), $DateEcheance]);
            $max++;
        }
        $reqNomType = DB::select('SELECT Nomtype FROM Prestations');
        $i = 0;
        foreach ($reqNomType as $reqNomTypedata) {
            $Nomtype[$i] = $reqNomTypedata -> Nomtype;
            if ($_POST[$Nomtype[$i]] == null) {
                $Qte[$i] = 0;
            }
            else {
                $Qte[$i] = $_POST[$Nomtype[$i]];
            }
            $i++;
        }
        for ($i=0; $i < $_POST['nb']; $i++) {
            DB::insert('insert into contenufacture (idFacture, Nomtype, Qte) values (?, ?, ?)', [$max, $Nomtype[$i], $Qte[$i]]);
        }
        return redirect('Facture?idFacture='.$max.'');
    }

    public function facture()
    {
        $j = 0;
        $adresse = DB::select('SELECT NomSport, Nom, Addrs, Ville, CodPost, Sport FROM ligue, facture WHERE ligue.NumLigue = facture.NumLigue AND idFacture = ' . $_GET['idFacture'] . '');
        $client = DB::select('SELECT idFacture, NumLigue, DateDeb, DateEcheance FROM facture WHERE idFacture = ' . $_GET['idFacture'] . '');
        $contenu = DB::select('SELECT contenufacture.NomType as "ContenuFacture", NomMat, Qte, Prix FROM contenufacture, prestations WHERE contenufacture.Nomtype = prestations.Nomtype AND idFacture = ' . $_GET['idFacture'] . '');
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
