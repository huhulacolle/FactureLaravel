<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class form extends Controller
{
    public function afficheLigue()
    {
        $ligue = DB::select('SELECT * FROM ligue');
        return view('ligues', compact('ligue'));
    }

    public function affichePrestation()
    {
        $prestation = DB::select('SELECT * FROM prestations ORDER BY NumPrestation');
        return view('prestations', compact('prestation'));
    }

    public function ajoutLigue()
    {
        DB::insert('Insert Into LIGUE Values ("' . $_POST['NumLigue'] . '","Ligue Loraine de ' . $_POST['NomSport'] . '","' . $_POST['Nom'] . '","' . $_POST['Addrs'] . '","' . $_POST['Ville'] . '","' . $_POST['CodPost'] . '","' . $_POST['Sport'] . '")');
        return back();
    }

    public function modifligue()
    {
        DB::update('update ligue set NomSport = "Ligue Loraine de '.$_POST['NomSport'].'", Nom = "'.$_POST['Nom'].'" , Addrs = "'.$_POST['Addrs'].'" , Ville = "'.$_POST['Ville'].'" , CodPost = '.$_POST['CodPost'].', Sport = "'.$_POST['Sport'].'" where NumLigue = '.$_POST['NumLigue'].'');
        return back();
    }

    public function supprimligue()
    {
        DB::delete('delete from ligue where NumLigue = '.$_POST['supr'].'');
        return back();
    }

    public function ajoutPrestation()
    {
        DB::insert('Insert Into prestations Values ("' . $_POST['NumPrestation'] . '","' . $_POST['Nomtype'] . '","' . $_POST['NomMat'] . '", ' . $_POST['Prix'] . ')');
        return back();
    }

    public function modifPrestation()
    {
        DB::update('update prestations set Nomtype = "'.$_POST['Nomtype'].'", NomMat = "'.$_POST['NomMat'].'" , Prix = '.$_POST['Prix'].' where NumPrestation = '.$_POST['NumPrestation'].'');
        return back();
    }

    public function supprimprestation()
    {
        DB::delete('delete from prestations where NumPrestation = '.$_POST['supr'].'');
        return back();
    }
}
