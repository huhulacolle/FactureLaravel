<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class facture extends Controller
{
    public function formfacture()
    {
        $sport = DB::select('SELECT NumLigue, Sport FROM ligue WHERE Delet = 0');
        $liste = DB::select('SELECT NumPrestation, NomMat, Prix FROM prestations WHERE Delet = 0');
        return view('formfacture', compact('sport', 'liste'));
    }

    public function voirfacture()
    {
        $idFacture = NULL;
        $facture = DB::select('SELECT idFacture, NomSport, DateDeb, DateEcheance FROM ligue, facture WHERE ligue.NumLigue = facture.NumLigue');
        return view('voirfacture', compact('facture', 'idFacture'));
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
        $reqNomType = DB::select('SELECT NumPrestation FROM prestations WHERE Delet = 0');
        $i = 0;
        foreach ($reqNomType as $reqNomTypedata) {
            $NumPrestation[$i] = $reqNomTypedata -> NumPrestation;
            if ($_POST[$NumPrestation[$i]] == null) {
                $Qte[$i] = 0;
            }
            else {
                $Qte[$i] = $_POST[$NumPrestation[$i]];
            }
            $i++;
        }
        for ($i=0; $i < $_POST['nb']; $i++) {
            DB::insert('insert into contenufacture (idFacture, NumPrestation, Qte) values (?, ?, ?)', [$max, $NumPrestation[$i], $Qte[$i]]);
        }
        return redirect('Facture/'.$max.'');
    }

    public function facture($idFacture)
    {
        $error = false;
        $j = 0;
        $prix[$j] = NULL;
        $adresse = DB::select('SELECT NomSport, Nom, Addrs, Ville, CodPost, Sport FROM ligue, facture WHERE ligue.NumLigue = facture.NumLigue AND idFacture = ' . $idFacture . '');
        $client = DB::select('SELECT idFacture, NumLigue, DateDeb, DateEcheance FROM facture WHERE idFacture = ' . $idFacture . '');
        $contenu = DB::select('SELECT prestations.NomType as "ContenuFacture", NomMat, Qte, Prix FROM contenufacture, prestations WHERE contenufacture.NumPrestation = prestations.NumPrestation AND idFacture =  ' . $idFacture . ' ORDER BY prestations.NumPrestation');
        if ($contenu == NULL) {
            $error = true;
        }
        foreach ($contenu as $contenudata) {
            $prix[$j] = ($contenudata -> Qte) * ($contenudata -> Prix);
            $j++;
        }
        $prix_total = 0;
        for ($i=0; $i < $j; $i++) {
            $prix_total = $prix_total + $prix[$i];
        }
        return view('facture', compact('adresse','client','contenu', 'prix', 'prix_total', 'error'));
    }

    public function pdfFacture()
    {
        $j = 0;
        $adresse = DB::select('SELECT NomSport, Nom, Addrs, Ville, CodPost, Sport FROM ligue, facture WHERE ligue.NumLigue = facture.NumLigue AND idFacture = 5174');
        $client = DB::select('SELECT idFacture, NumLigue, DateDeb, DateEcheance FROM facture WHERE idFacture = 5174');
        $contenu = DB::select('SELECT prestations.NomType as "ContenuFacture", NomMat, Qte, Prix FROM contenufacture, prestations WHERE contenufacture.NumPrestation = prestations.NumPrestation AND idFacture =  5174 ORDER BY prestations.NumPrestation');
        foreach ($contenu as $contenudata) {
            $prix[$j] = ($contenudata -> Qte) * ($contenudata -> Prix);
            $j++;
        }
        $prix_total = 0;
        for ($i=0; $i < $j; $i++) {
            $prix_total = $prix_total + $prix[$i];
        }
        $pdf = PDF::LoadView('pdf_facture', compact('adresse','client','contenu', 'prix', 'prix_total'));
        return $pdf->download('Facture.pdf');
        // return view('pdf_facture', compact('adresse','client','contenu', 'prix', 'prix_total'));
    }
}
