<title>Lista Vendedores</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
<head>
<div class="col-md-9">
    <div class="">
        <h1 class="align-self-end">Vendedores</h1>

        <a class="btn btn-primary align-self-end" href="create">Nuevo Vendedores</a>
    </div>
</head>

<body>
    <table class="table">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>RUT</th>
            <th>Correo</th>
            <th>telefono</th>
            <th>Estado laboral</th>
        </tr>
        </thead>
           <tbody>
               <tr>
                <td>Nombres</td>
                <td>Apellido</td>
                <td>RUT</td>
                <td>Correo</td>
                <td>telefono</td>
                <td>Estado laboral</td>
               </tr>
           </tbody>
    </table>
</div>
</div>
</div>
</body>
@endsection

