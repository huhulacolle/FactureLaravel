<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class form extends Controller
{
    public function afficheLigue()
    {
        $ligue = DB::select('select * from ligue');
        return view('ligues', compact('ligue'));
    }

    public function ajoutLigue()
    {
        DB::insert('Insert Into LIGUE Values ("' . $_POST['NumLigue'] . '","Ligue Loraine de ' . $_POST['NomSport'] . '","' . $_POST['Nom'] . '","' . $_POST['Addrs'] . '","' . $_POST['Ville'] . '","' . $_POST['CodPost'] . '","' . $_POST['Sport'] . '")');
        return back();
    }

    public function modifligue()
    {

    }

    public function supprimligue()
    {
        DB::delete('delete from ligue where NumLigue = '.$_POST['supr'].'');
        return back();
    }
}
