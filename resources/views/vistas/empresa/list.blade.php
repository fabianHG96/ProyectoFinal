<title>Lista de la empresa</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
<head>
<div class="col-md-9">
    <div class="">
        <h1 class="align-self-end">Empresas</h1>

        <a class="btn btn-primary align-self-end" href="create">Nueva Empresa</a>
    </div>
</head>

<body>
    <table class="table">
    <thead>
        <tr>
            <th>Nombre empresa</th>
            <th>RUT empresa</th>
            <th>Pais</th>
            <th>Region</th>
            <th>Rubro</th>
            <th>Fecha de la Fundacion</th>
            <th>email</th>
            <th>telefono</th>
        </tr>
        </thead>
           <tbody>
               <tr>
                <td>Nombre empresa</td>
                <td>RUT empresa</td>
                <td>Pais</td>
                <td>Region</td>
                <td>Rubro</td>
                <td>Fecha de la Fundacion</td>
                <td>email</td>
                <td>telefono</td>
               </tr>
           </tbody>
    </table>
</div>
</div>
</div>
</body>
@endsection

