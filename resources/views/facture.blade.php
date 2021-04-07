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
