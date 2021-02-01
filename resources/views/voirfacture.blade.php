@extends('layout')
@section('content')
<center>
    <h2><strong>Facture</strong></h2>
    <h6> Selectionner la facture à afficher </h6>
</center>
<br>
<div class="mx-auto" style="width: 600px;">
    @foreach ($facture as $facturedata)
    <?php
    if ($facturedata -> idFacture == null) {
        echo "<br> <h5> <center> Aucune facture n'a été créée </center> </h5>";
    }
    ?>
    @endforeach
    <table class="table table-borderless">
        <form action="Facture" method="post">
            @foreach ($facture as $facturedata)
            <tr>
                <td> Facture N° FC {{$facturedata -> idFacture}} : </td>
                <td>
                    <button type="submit" class="btn btn-link" name="idFacture" value={{$facturedata -> idFacture}}>
                        {{$facturedata -> NomSport}} : {{$facturedata -> DateDeb}} - {{$facturedata -> DateEcheance}}
                    </button>
                </td>
            </tr>
            @endforeach
        </form>
    </table>
</div>
@endsection
