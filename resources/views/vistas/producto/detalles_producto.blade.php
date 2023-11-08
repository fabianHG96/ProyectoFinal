<div class="row mt-4">
    <div class="col-md-6">
        <h2>{{ $producto->nombre_producto }}</h2>
        <div class="details">
            <p><strong>Creado el:</strong> {{ $producto->created_at->format('d/m/Y H:i:s') }}</p>
            <p><strong>Última actualización:</strong> {{ $producto->updated_at->format('d/m/Y H:i:s') }}</p>
            <p><strong>Categoría:</strong> {{ $producto->categoria->categoria }}</p>
            <p><strong>Bodega:</strong> {{ $producto->bodega->direccion }}</p>
            <p><strong>Cantidad en Stock:</strong> {{ $producto->cantidad_stock }}</p>
            <p><strong>Precio Unitario:</strong> ${{ number_format($producto->precio_unitario, 2) }}</p>
            <p><strong>Total:</strong> ${{ number_format($producto->total, 2) }}</p>
        </div>
    </div>
</div>

