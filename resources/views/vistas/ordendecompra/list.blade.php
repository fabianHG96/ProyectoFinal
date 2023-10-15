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
            <th>Proveedor</th>
            <th>Empleado</th>
            <th>Fecha de Solicitud </th>
            <th>Detalle del Producto</th>
            <th>Estado</th>
            <th>Empresa</th>
            <th>Total</th>
        </tr>
        </thead>
           <tbody>
               <tr>
                <td>Proveedor</td>
                <td>Empleado</td>
                <td>Fecha de Solicitud </td>
                <td>Detalle del Producto</td>
                <td>Estado</td>
                <td>Empresa</td>
                <td>Total</td>
               </tr>
           </tbody>
    </table>
</div>
</div>
</div>
</body>
@endsection

