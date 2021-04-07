<style>
    .size {
        font-size: 10pt;
    }
</style>
@extends('layout')
@section('content')
<div style="margin-left :100px;">
    <a href="VoirFacture" class="btn btn-link">Retour</a>
</div>

<div class="mx-auto" style="width: 800px;">
    <table class="table table-bordered">
        <tr>
            <td>
                <img src="mdl.png" height="150px" width="150px">
                <center>
                    <h1>
                        <strong> Facture </strong>
                    </h1>
                </center>
                <br><br>
                @foreach ($adresse as $adressedata)
                Maison Régionale des Sports de Lorraine
                <br>
                {{$adressedata -> Addrs}}
                <br>
                <strong> {{$adressedata -> CodPost}} {{$adressedata -> Ville}} </strong>
                <br> <br>
                <div style="float: right;">
                    <div class="col px-md-5">
                        {{$adressedata -> NomSport}}
                        <br>
                        à l'attention de {{$adressedata -> Nom}}
                    </div>
                    @endforeach
                </div>
                <br><br><br>
                <div style="text-align: center">
                    <table class="table table-borderless">
                        <thead>
                            <td> Date </td>
                            <td> Code Client </td>
                            <td> N° Facture </td>
                            <td> Échéance </td>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($client as $clientdata)
                                <td> {{$clientdata -> DateDeb}} </td>
                                <td> {{$clientdata -> NumLigue}} </td>
                                <td> {{$clientdata -> idFacture}} </td>
                                <td> {{$clientdata -> DateEcheance}} </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br><br>
                <div style="text-align: center">
                    <table class="table table-borderless">
                        <thead>
                            <th> Réference </th>
                            <th> Désignation </th>
                            <th> Quantité </th>
                            <th> PUHT </th>
                            <th> Montant HT </th>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            @foreach ($contenu as $contenudata)
                                <tr>
                                    <td> {{$contenudata -> ContenuFacture}} </td>
                                    <td> {{$contenudata -> NomMat}} </td>
                                    <td> {{$contenudata -> Qte}} </td>
                                    <td> {{$contenudata -> Prix}}€ </td>
                                    <td> {{$prix[$i]}}€ </td>
                                    <?php $i++ ?>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"> &ensp; </td>
                                <td>
                                    <h4><strong>  Total HT  </strong></h4>
                                    <h5>{{$prix_total}}€</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <h1 class="size">
                    Déclarée à la préfecture de Meurthe et Moselle N° 3898
                    <br> <br>
                    Domiciliation bancaire 10278 04065 000 166911045 05
                    <br> <br>
                    Merci de bien vouloir préciser les références de la facture
                    acquittée
                    <br> <br>
                    TVA non applicable
                    <br> <br> <br> <br>
                    Siret 31740105700029 <br> Tél <strong> 03.83.18.87.02 </strong>
                    <br> Fax 03.83.18.87.03
                </h1>
                <br><br>
            </td>
        </tr>
    </table>
</div>
@endsection
