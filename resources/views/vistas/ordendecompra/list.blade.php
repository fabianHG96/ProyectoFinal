<title>Orden de Compra</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
<head>
<div class="col-md-9">
    <div class="">
        <h1 class="align-self-end">Listado Orden de Compra</h1>

        <a class="btn btn-primary align-self-end" href="create">Nueva Orden de la compra</a>
    </div>
</head>

<body>
    <table class="table">
    <thead>
        <tr>
            <th>Fecha Solicitud</th>
            <th>Detalles</th>
            <th>Estado</th>
            <th>Total</th>
        </tr>
        </thead>
           <tbody>
               <tr>
                <td>Fecha Solicitud</td>
                <td>Detalles</td>
                <td>Estado</td>
                <td>Total</td>
               </tr>
           </tbody>
    </table>
</div>
</div>
</div>
</body>
@endsection

