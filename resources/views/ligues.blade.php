@extends('layout')
<style>
    p {
        padding-top: 21px;
    }
</style>
@section('content')
<center>
    <h2><strong>Ligues</strong></h2>
</center>
<br>
<table class="table table-hover">
    <thead>
        <tr>
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
                <?php $max = $liguedata -> NumLigue ?>
                <td>
                    <?php
                $NomSport = explode(" ", $liguedata -> NomSport);
                $NomSport = $NomSport[3];
                ?>
                    Ligue Loraine de <input type="text" name="NomSport" class="form-control" value={{$NomSport}}
                        required>
                </td>
                <td>
                    <p><input type="text" name="Nom" class="form-control" value="{{$liguedata -> Nom}}" required></p>
                    <?php Log::debug($liguedata -> Nom); ?>
                </td>
                <td>
                    <p><input type="text" name="Addrs" class="form-control" value="{{$liguedata -> Addrs}}" required>
                    </p>
                </td>
                <td>
                    <p><input type="text" name="Ville" class="form-control" value="{{$liguedata -> Ville}}" required></p>
                </td>
                <td>
                    <p>
                        <input type="number" name="CodPost" class="form-control" step="0.01"
                            value={{$liguedata -> CodPost}} required>
                    </p>
                </td>
                <td>
                    <p><input type="text" name="Sport" class="form-control" value={{$liguedata -> Sport}} required></p>
                </td>
                <td>
                    <p> <button type="submit" name="NumLigue" class="btn btn-primary" value={{$liguedata -> NumLigue}}>
                            Modifier
                        </button>
                    </p>
                </td>
            </form>
            <form action="supprimligue" method="post">
                @csrf
                <td>
                    <p>
                        <button type="submit" name="supr" class="btn btn-primary" value={{$liguedata -> NumLigue}}>
                            Supprimer
                        </button>
                    </p>
                </td>
            </form>
        </tr>
        @endforeach
        <form action="ajoutligue" method="post">
            @csrf
            <tr>
                <td>
                    Ligue Loraine de <input type="text" class="form-control" name="NomSport" required>
                </td>
                <td>
                    <p><input type="text" class="form-control" name="Nom" placeholder="Prénom NOM" required></p>
                </td>
                <td>
                    <p><input type="text" class="form-control" name="Addrs" required></p>
                </td>
                <td>
                    <p><input type="text" class="form-control" name="Ville" required></p>
                </td>
                <td>
                    <p>
                        <input type="number" class="form-control" oninput="maxLengthCheck(this)" maxlength="5"
                            name="CodPost" minlength="0" required>
                    </p>
                </td>
                <td>
                    <p><input type="text" class="form-control" name="Sport" required></p>
                </td>
                <td colspan="2">
                    <p><button type="submit" class="btn btn-primary btn-lg btn-block"> Ajouter </button></p>
                </td>
            </tr>
        </form>
    </tbody>
</table>
<script>
    // This is an old version, for a more recent version look at
    // https://jsfiddle.net/DRSDavidSoft/zb4ft1qq/2/
    function maxLengthCheck(object) {
        if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }

</script>
@endsection
