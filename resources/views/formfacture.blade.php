@extends('layout')
@section('content')
<center>
    <h2><strong>Nouvelle Facture</strong></h2>
</center>
<br>
<div class="mx-auto" style="width: 500px;">
    <table class="table table-borderless">
        <tr>
            <td>
                <select name="sport" class="form-control">
                    @foreach ($sport as $sportdata)
                    <option>
                        {{$sportdata -> Sport}}
                    </option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Désignation</strong>
            </td>
            <td>
                <strong> Quantité </strong>
            </td>
            <td>
                <strong> Prix </strong>
            </td>
        </tr>
        @foreach ($liste as $listedata)
        <tr>
            <td>
                {{$listedata -> NomMat}}
            </td>
            <td>
                <input type="number" name={{$listedata -> Nomtype}} class="form-control">
            </td>
            <td>
                {{$listedata -> Prix}}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
