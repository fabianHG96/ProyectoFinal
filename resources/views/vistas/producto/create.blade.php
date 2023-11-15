<title>Crear Producto</title>
@extends('layouts.main')
@section('main-content')
@if (Auth::user()->cargo_id != 1 && Auth::user()->cargo_id != 3 && Auth::user()->cargo_id != 4 && Auth::user()->cargo_id != 5)
    <script>
        $(document).ready(function(){
            $('#noPermissionsModal').modal('show');
        });
    </script>
@endif
<div class="container">
    <section>
        <div class="header-and-button d-flex justify-content-between align-items-center">
            <h1 class="header">Crear un Producto</h1>
        </div>
        <hr />
    </section>
    <form method="POST" action="{{ route('register.Productos') }}">
        @csrf
        <div class="container">
            <button type="button" class="add-row">Agregar Producto</button>
        </div >

        <table class="table">
            <thead>
                <tr>
                    <th>Bodega</th>
                    <th>Categoría</th>
                    <th>Nombre del Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="product-table">
                <tr>
                    <td>
                        <select name="bodega_id[]" class="form-select">
                            <option value="">Selecciona una bodega</option>
                            @foreach ($bodegas as $bodega)
                                <option value="{{ $bodega->id }}">{{ $bodega->direccion }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="categoria_id[]" class="form-select">
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="nombre_producto[]"></td>
                    <td><input type="number" class="form-control" name="cantidad_stock[]"></td>
                    <td><input type="number" class="form-control" name="precio_unitario[]"></td>
                    <td><input type="number" class="form-control" name="total[]" readonly></td>
                    <td>
                        <button type="button" class="remove-row">Eliminar</button>
                    </td>
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
            newRow.querySelector(".remove-row").style.display = "block";
            document.querySelector("#product-table").appendChild(newRow);
        });

        document.querySelector(".remove-row").style.display = "none";

        document.querySelector("table").addEventListener("input", function (event) {
            if (event.target.name === "cantidad_stock[]" || event.target.name === "precio_unitario[]") {
                const row = event.target.closest("tr");
                const cantidad = row.querySelector("input[name='cantidad_stock[]']").value;
                const precioUnitario = row.querySelector("input[name='precio_unitario[]']").value;
                const total = cantidad * precioUnitario;

                row.querySelector("input[name='total[]']").value = total;
            }
        });

        document.querySelector("input[type='submit']").addEventListener("click", function (event) {
            const categoriaInputs = document.querySelectorAll("select[name='categoria_id[]']");
            let hasError = false;

            categoriaInputs.forEach(function (categoriaInput) {
                if (categoriaInput.value === "") {
                    hasError = true;
                    alert("Por favor, selecciona una categoría para cada producto.");
                }
            });

            if (hasError) {
                event.preventDefault(); // Evitar que se envíe el formulario si hay errores
            }
        });

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
