<title>Lista Empleados</title>
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
            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>RUT</th>
            <th>Fecha de Contratación</th>
            <th>Salario</th>
            <th>Estado Laboral</th>
            <th>Dirección</th>
            <th>Inicio</th>
            <th>Término</th>
        </tr>
        </thead>
           <tbody>
               <tr>
                <td>Nombres</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>RUT</td>
                <td>Fecha de Contratación</td>
                <td>Salario</td>
                <td>Estado Laboral</td>
                <td>Dirección</td>
                <td>Inicio</td>
                <td>Término</td>
               </tr>
           </tbody>
    </table>
</div>
</div>
</div>
</body>
@endsection

