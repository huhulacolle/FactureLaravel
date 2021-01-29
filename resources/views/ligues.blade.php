@extends('layout')
@section('content')
<center>
    <h1><strong>Ligues</strong></h1>
</center>
<br>
<table class="table table-hover">
    <tr>
        <th scope="col"> ID </th>
        <th scope="col"> Ligue </th>
        <th scope="col"> Nom </th>
        <th scope="col"> Adresse </th>
        <th scope="col"> Ville </th>
        <th scope="col"> Code Postal </th>
        <th scope="col"> Sport </th>
    </tr>
    @foreach ($ligue as $liguedata)
    <tr>
        <td>
            {{$liguedata -> NumLigue}}
            <?php $max = $liguedata -> NumLigue ?>
        </td>
        <td>
            {{$liguedata -> NomSport}}
        </td>
        <td>
            {{$liguedata -> Nom}}
        </td>
        <td>
            {{$liguedata -> Addrs}}
        </td>
        <td>
            {{$liguedata -> Ville}}
        </td>
        <td>
            {{$liguedata -> CodPost}}
        </td>
        <td>
            {{$liguedata -> Sport}}
        </td>
    </tr>
    @endforeach
    <form action="ajoutligue" method="post">
        <tr>
            <td>
                <input type="text" class="form-control" name="NumLigue" value={{$max + 1}} readonly>
            </td>
            <td>
                Ligue Loraine de</div> <input type="text" class="form-control" name="NomSport" required>
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
            <td>
                <input type="submit" class="btn btn-primary">
            </td>
        </tr>
    </form>
</table>
@endsection
