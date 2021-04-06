@extends('layout')
@section('content')
<div class="mx-auto" style="width: 800px;">
    <table class="table table-bordered">
        <tr>
            <td>
                <img src="mdl.png" height="150px" width="150px">
                <center>
                    <strong>
                        <h1> Facture </h1>
                    </strong>
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
                <br><br>
            </td>
        </tr>
    </table>
</div>
@endsection
{{-- <th> Date </th>
<th> Code Client </th>
<th> N° Facture </th>
<th> Échéance </th>
<tr> {{$clientdata -> DateDeb}} </tr>
<tr> {{$clientdata -> NumLigue}} </tr>
<tr> {{$clientdata -> idFacture}} </tr>
<tr> {{$clientdata -> DateEcheance}} </tr> --}}
