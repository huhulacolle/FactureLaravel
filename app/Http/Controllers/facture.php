<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class facture extends Controller
{
    public function formfacture()
    {
        $sport = DB::select('SELECT NumLigue, Sport FROM LIGUE');
        $liste = DB::select('SELECT Nomtype, NomMat, Prix FROM Prestations');
        return view ('formfacture', compact('sport'), compact('liste'));
    }

    public function voirfacture()
    {
        $facture = DB::select('SELECT idFacture, NomSport, DateDeb, DateEcheance FROM LIGUE, Facture WHERE LIGUE.NumLigue = Facture.NumLigue');
        return view('voirfacture', compact('facture'));
    }
}
