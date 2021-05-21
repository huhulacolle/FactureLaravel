@extends('layout')
<style>
    p {
        padding-top: 9px;
    }

</style>
@section('content')
<center>
    <h2><strong>Facture</strong></h2>
    <h6> Selectionner la facture à afficher </h6>
</center>
<br>
<div class="mx-auto" style="width: 600px;">
    @foreach ($facture as $facturedata)
    <?php $idFacture = $facturedata -> idFacture ?>
    @endforeach
    <?php
    if ($idFacture == NULL) {
        echo " <br> <h5> <center> Aucune facture n'a été créée </center> </h5>";
    }
    ?>
    <table class="table table-borderless">
        @foreach ($facture as $facturedata)
            <tr>
                <td>
                    <p> Facture N° FC {{$facturedata -> idFacture}} : </p>
                </td>
                <td>
                    <a href="Facture/{{$facturedata -> idFacture}}" class="btn btn-link">{{$facturedata -> NomSport}} : {{$facturedata -> DateDeb}} - {{$facturedata -> DateEcheance}}</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
