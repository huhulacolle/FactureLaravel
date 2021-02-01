@extends('layout')
@section('content')
<center>
    <h1><strong>Ligues</strong></h1>
</center>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col"> ID </th>
            <th scope="col"> Ligue </th>
            <th scope="col"> Nom </th>
            <th scope="col"> Adresse </th>
            <th scope="col"> Ville </th>
            <th scope="col"> Code Postal </th>
            <th scope="col"> Sport </th>
            <th scope="col"> &ensp; </th>
            <th scope="col"> &ensp; </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ligue as $liguedata)
        <tr>
            <form action="modifligue" method="post">
                @csrf
                <td>
                    <input type="text" class="form-control" value={{$liguedata -> NumLigue}} readonly>
                    <?php $max = $liguedata -> NumLigue ?>
                </td>
                <td>
                    <?php
                $NomSport = explode(" ", $liguedata -> NomSport);
                $NomSport = $NomSport[3];
                Log::debug($NomSport);
                ?>
                    Ligue Loraine de <input type="text" name="NomSport" class="form-control" value={{$NomSport}}
                        required>
                </td>
                <td>
                    <input type="text" name="Nom" class="form-control" value={{$liguedata -> Nom}} required>
                </td>
                <td>
                    <?php Log::debug($liguedata -> Addrs); ?>
                    <input type="text" name="Addrs" class="form-control" value="{{$liguedata -> Addrs}}" required>
                </td>
                <td>
                    <input type="text" name="Ville" class="form-control" value={{$liguedata -> Ville}} required>
                </td>
                <td>
                    <input type="number" name="CodPost" class="form-control" value={{$liguedata -> CodPost}} required>
                </td>
                <td>
                    <input type="text" name="Sport" class="form-control" value={{$liguedata -> Sport}} required>
                </td>
                <td>
                    <button type="submit" name="NumLigue" class="btn btn-primary" value={{$liguedata -> NumLigue}}>
                        Modifier
                    </button>
                </td>
            </form>
            <form action="supprimligue" method="post">
                @csrf
                <td>
                    <button type="submit" name="supr" class="btn btn-primary" value={{$liguedata -> NumLigue}}>
                        Supprimer
                    </button>
                </td>
            </form>
        </tr>
        @endforeach
        <form action="ajoutligue" method="post">
            @csrf
            <tr>
                <td>
                    <input type="text" class="form-control" name="NumLigue" value={{$max + 1}} readonly>
                </td>
                <td>
                    Ligue Loraine de <input type="text" class="form-control" name="NomSport" required>
                </td>
                <td>
                    <input type="text" class="form-control" name="Nom" placeholder="Prénom NOM" required>
                </td>
                <td>
                    <input type="text" class="form-control" name="Addrs" required>
                </td>
                <td>
                    <input type="text" class="form-control" name="Ville" required>
                </td>
                <td>
                    <input type="number" class="form-control" name="CodPost" minlength="0" maxlength="5" required>
                </td>
                <td>
                    <input type="text" class="form-control" name="Sport" required>
                </td>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary btn-lg btn-block"> Ajouter </button>
                </td>
            </tr>
        </form>
    </tbody>
</table>
@endsection
