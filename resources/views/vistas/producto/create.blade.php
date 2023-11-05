<title>Crear Producto</title>
@extends('layouts.main')
@section('main-content')
<div class="container">
    <section>
        <div class="header-and-button d-flex justify-content-between align-items-center">
            <h1 class="header">Crear un Producto</h1>
        </div>
        <hr />
    </section>
    <form method="POST" action="{{ route('register.Productos') }}">
        @csrf
        <div class="d-flex justify-content-end mt-4">
            <button type="button" class="add-row">Agregar Producto</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Nombre del Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Bodega</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="product-table">
                <tr>
                    <td>
                        <select name="categoria_id[]">
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" name="nombre_producto[]"></td>
                    <td><input type="number" name="cantidad_stock[]"></td>
                    <td><input type="number" name="precio_unitario[]"></td>
                    <td>
                        <select name="bodega_id[]">
                            <option value="">Selecciona una bodega</option>
                            @foreach ($bodegas as $bodega)
                                <option value="{{ $bodega->id }}">{{ $bodega->direccion }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><button type="button" class="remove-row">Eliminar</button></td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-4">
            <input type="submit" value="Guardar" class="btn btn-primary">
        </div>
    </form>
</div>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector(".add-row").addEventListener("click", function () {
            const newRow = document.querySelector("table tbody tr").cloneNode(true);
            newRow.querySelectorAll("input, select").forEach((element) => {
                element.value = "";
            });
            newRow.querySelector(".remove-row").style.display = "block"; // Mostrar el botón "Eliminar" en la nueva fila
            document.querySelector("#product-table").appendChild(newRow);
        });

        document.querySelector(".remove-row").style.display = "none"; // Ocultar el botón "Eliminar" en la primera fila

        document.querySelector("table").addEventListener("click", function (event) {
            if (event.target.classList.contains("remove-row")) {
                if (document.querySelector("table tbody").rows.length > 1) {
                    event.target.closest("tr").remove();
                }
            }
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
