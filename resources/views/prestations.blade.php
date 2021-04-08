@extends('layout')
@section('content')
<center>
    <h2><strong>Prestations</strong></h2>
</center>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col"> Type </th>
            <th scope="col"> Matériel </th>
            <th scope="col"> Prix </th>
            <th scope="col"> &ensp; </th>
            <th scope="col"> &ensp; </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($prestation as $prestationdata)
        <?php $max = $prestationdata -> NumPrestation ?>
        <tr>
            <form action="modifprestation" method="post">
                @csrf
                <td>
                    <input type="text" class="form-control" name="Nomtype" value={{$prestationdata -> Nomtype}}
                        required>
                </td>
                <td>
                    <input type="text" class="form-control" name="NomMat" value="{{$prestationdata -> NomMat}}" required>
                </td>
                <td>
                    <input type="number" class="form-control" name="Prix" step="0.01" value={{$prestationdata -> Prix}} required>
                </td>
                <td>
                    <center>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </center>
                </td>
            </form>
            <td>
                <form action="supprimprestation" method="post">
                    @csrf
                    <center>
                        <button type="submit" class="btn btn-primary" name="supr"
                            value={{$prestationdata -> NumPrestation}}>Supprimer</button>
                    </center>
                </form>
            </td>
        </tr>
        @endforeach
        <form action="ajoutprestation" method="post">
            @csrf
            <tr>
                <td>
                    <input type="text" class="form-control" name="Nomtype" required>
                </td>
                <td>
                    <input type="text" class="form-control" name="NomMat" required>
                </td>
                <td>
                    <input type="number" class="form-control" step="any" name="Prix" required>
                </td>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary btn-lg btn-block"> Ajouter </button>
                </td>
            </tr>
        </form>
    </tbody>
</table>
@endsection
