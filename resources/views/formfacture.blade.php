<?php $nb = 0; ?>
@extends('layout')
@section('content')
<center>
    <h2><strong>Nouvelle Facture</strong></h2>
</center>
<br>
<form action="CreeFacture" method="post">
    @csrf
    <div class="mx-auto" style="width: 650px;">
        <table class="table table-borderless">
            <tr>
                <td>
                    <select name="NumLigue" class="form-control">
                        @foreach ($sport as $sportdata)
                        <option value={{$sportdata -> NumLigue}}> {{$sportdata -> Sport}} </option>
                        @endforeach
                    </select>
                </td>
                <td>&ensp;</td>
                <td>&ensp;</td>
            </tr>
            <tr>
                <td> <strong> Désignation </strong> </td>
                <td> <strong> Quantité </strong> </td>
                <td> <strong> Prix </strong> </td>
            </tr>
            @foreach ($liste as $listedata)
            <tr>
                <td>
                    {{$listedata -> NomMat}}
                </td>
                <td>
                    <input type="number" name={{$listedata -> NumPrestation}} placeholder=0 class="form-control">
                </td>
                <td>
                    {{$listedata -> Prix}}
                </td>
            </tr>
            <?php $nb++ ?>
            @endforeach
            <input type="hidden" name="nb" value={{$nb}}>
            <tr>
                <td colspan="3"> &ensp; </td>
                <td>
                    <input type="submit" value="Crée la Facture" class="btn btn-primary">
                </td>
            </tr>
        </table>
    </div>
</form>
@endsection
