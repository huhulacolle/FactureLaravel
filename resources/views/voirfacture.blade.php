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
                    <a href="Facture?idFacture={{$facturedata -> idFacture}}" class="btn btn-link">{{$facturedata -> NomSport}} : {{$facturedata -> DateDeb}} - {{$facturedata -> DateEcheance}}</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{-- <table class="table table-borderless">
        <form action="Facture" method="get">
            @csrf
            @foreach ($facture as $facturedata)
            <tr>
                <td> <p> Facture N° FC {{$facturedata -> idFacture}} : </p>
    </td>
    <td>
        <button type="submit" class="btn btn-link" name="idFacture" value={{$facturedata -> idFacture}}>
            {{$facturedata -> NomSport}} : {{$facturedata -> DateDeb}} - {{$facturedata -> DateEcheance}}
        </button>
    </td>
    </tr>
    @endforeach
    </form>
    </table> --}}
</div>
@endsection
