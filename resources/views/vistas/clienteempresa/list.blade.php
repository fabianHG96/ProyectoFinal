<title>Lista de los Clientes de la Empresa</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
<head>
<div class="col-md-9">
    <div class="">
        <h1 class="align-self-end">Empleados</h1>

        <a class="btn btn-primary align-self-end" href="create">Nuevo Empleado</a>
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
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Email</th>
        </tr>
        </thead>
           <tbody>
               <tr>
                <td>Nombre empresa</td>
                <td>RUT empresa</td>
                <td>Pais</td>
                <td>Region</td>
                <td>Direccion</td>
                <td>Telefono</td>
                <td>Email</td>
               </tr>
           </tbody>
    </table>
</div>
</div>
</div>
</body>
@endsection

