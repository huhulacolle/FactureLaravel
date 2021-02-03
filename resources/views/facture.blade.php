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
                <div class="col px-md-5">
                    {{$adressedata -> NomSport}}
                    <br>
                    à l'attention de {{$adressedata -> Nom}}
                </div>
                @endforeach
            </td>
        </tr>
    </table>
</div>
@endsection
