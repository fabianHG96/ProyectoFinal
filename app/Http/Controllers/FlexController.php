<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Factura;
use App\Models\ClienteEmpresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use TCPDF;
use App\Models\PdfDocument;
use Illuminate\Support\Facades\Response;
use App\Models\DetalleFactura;
use App\Models\OrdenDeCompra;
use Spatie\PdfToText\Pdf;
use Smalot\PdfParser\Parser;
class FlexController extends Controller
{
    public function index(){
        $authenticated_user = Auth::user();

    return view('admin.home')->with([
        'user' => $authenticated_user,
    ]);
    }
    function Manager(){
        $authenticated_user = Auth::user();
        return view('vistas.manager.usuarios')->with(['user' => $authenticated_user,]);
     }

        public function listFactura(){
        $factura = Factura::all();
        return view('vistas.rFactura.list', ['mostrarfactura' => $factura]);
        }


        function SeguimientoClientes(Request $request){
            $authenticatedUser = Auth::user();
            $tipoConsulta = $request->input('tipo_consulta', 'total_facturas');
            $fechaInicio = $request->input('fechaInicio');
            $fechaFin = $request->input('fechaFin');

            $query = DetalleFactura::query();

            // Filtrar por fechas si se proporcionan ambas fechas
            if (!empty($fechaInicio) && !empty($fechaFin)) {
                $query->whereBetween('fecha_emision', [$fechaInicio, $fechaFin]);
            }

            $query->select('rut_cliente', 'nombre_cliente', 'fecha_emision');

            if ($tipoConsulta === 'total_facturas') {
                $query->selectRaw('count(*) as total');
            } elseif ($tipoConsulta === 'total_ventas') {
                $query->selectRaw('sum(total_factura) as total');
            }

            // No agrupar por la fecha de emisión
            $resultadosConsulta = $query->groupBy('rut_cliente', 'nombre_cliente')->get();

            return view('vistas.sClientes.seguimiento', compact('resultadosConsulta', 'tipoConsulta', 'fechaInicio', 'fechaFin'))->with(['user' => $authenticatedUser]);
        }

            function SeguimientoProductos(){
                $authenticated_user = Auth::user();
                return view('vistas.sProductos.seguimiento')->with(['user' => $authenticated_user,]);
            }

            function SeguimientoProveedores(Request $request){
                $authenticatedUser = Auth::user();
            $tipoConsulta = $request->input('tipo_consulta', 'total_pedidos');
            $fechaInicio = $request->input('fechaInicio');
            $fechaFin = $request->input('fechaFin');

            $query = OrdenDeCompra::query();

            // Filtrar por fechas si se proporcionan ambas fechas
            if (!empty($fechaInicio) && !empty($fechaFin)) {
                $query->whereBetween('fecha_solicitud', [$fechaInicio, $fechaFin]);
            }

            $query->select('proveedor_id', 'nombre_proveedor', 'fecha_solicitud','fecha_termino');

            if ($tipoConsulta === 'total_pedidos') {
                $query->selectRaw('count(*) as total');
            } elseif ($tipoConsulta === 'total_compras') {
                $query->selectRaw('sum(total) as total');
            }

            $query->groupBy('proveedor_id', 'nombre_proveedor');

            $resultadosConsulta = $query->get();

            return view('vistas.sProveedores.seguimiento', compact('resultadosConsulta', 'tipoConsulta', 'fechaInicio', 'fechaFin'))->with(['user' => $authenticatedUser]);
        }


     public function listUsers(){
        $users = User::all();
        return view('vistas.manager.usuarios', ['mostraruser' => $users]);
    }



    public function subirFactura(Request $request)
    {
        $request->validate([
            'nombre_archivo' => 'required',
            'archivo_pdf' => 'required|mimes:pdf',
        ]);

        if ($request->hasFile('archivo_pdf')) {
            $archivo = $request->file('archivo_pdf');

            try {
                // Agregar un identificador único al nombre del archivo
                $nombreArchivo = $request->input('nombre_archivo') . '_' . uniqid();
                $rutaArchivo = 'archivos/' . $nombreArchivo . '.' . $archivo->getClientOriginalExtension();

                $archivo->move(public_path('archivos'), $rutaArchivo);

                // Crear el registro de la factura con el nombre del archivo
                $factura = new Factura();
                $factura->nombre_archivo = $nombreArchivo;
                $factura->ruta_archivo = $rutaArchivo;
                $factura->save();

                // Instantiate the Parser class
                $parser = new Parser();

                // Leer el contenido del archivo PDF
                $rutaCompletaArchivo = public_path($rutaArchivo);
                $pdf = $parser->parseFile($rutaCompletaArchivo);
                $contenidoFactura = $pdf->getText();

                // Expresiones regulares para extraer información
                preg_match('/SEÑOR\(ES\): (.+?)\R/', $contenidoFactura, $matches);
                $nombreCliente = isset($matches[1]) ? trim($matches[1]) : '';

                preg_match('/R\.U\.T\.: (.+?)\R/', $contenidoFactura, $matches);
                $rutCliente = isset($matches[1]) ? trim($matches[1]) : '';

              // Expresión regular para extraer la fecha
              preg_match('/Fecha Emision: (\d+) de (\w+) del (\d+)/', $contenidoFactura, $matches);
              $dia = isset($matches[1]) ? trim($matches[1]) : '';
              $mesTexto = isset($matches[2]) ? trim($matches[2]) : '';
              $ano = isset($matches[3]) ? trim($matches[3]) : '';

              // Mapear nombres de mes a números
              $meses = [
                  'enero' => 1, 'febrero' => 2, 'marzo' => 3, 'abril' => 4,
                  'mayo' => 5, 'junio' => 6, 'julio' => 7, 'agosto' => 8,
                  'septiembre' => 9, 'octubre' => 10, 'noviembre' => 11, 'diciembre' => 12,
              ];

              // Convertir el nombre del mes a minúsculas para asegurar la coincidencia en el mapeo
              $mesTextoMinusculas = strtolower($mesTexto);

              // Verificar si el nombre del mes está en el mapeo
              if (!isset($meses[$mesTextoMinusculas])) {
                  // Manejar el caso en el que el nombre del mes no está en el mapeo
                  dd('No se pudo analizar la fecha correctamente. Mes desconocido.');
              }

              // Obtener el número del mes del mapeo
              $mesNumero = $meses[$mesTextoMinusculas];

              try {
                  // Intentar construir la fecha con Carbon
                  $fechaEmisionCarbon = \Carbon\Carbon::create($ano, $mesNumero, $dia);
              } catch (\Exception $e) {
                  // Manejar el error si no se puede construir la fecha
                  dd('No se pudo analizar la fecha correctamente.', $e->getMessage());
              }


                preg_match('/MONTO NETO[^\$]*\$([\d,.]+)/', $contenidoFactura, $matches);
                $montoNeto = isset($matches[1]) ? floatval(str_replace([',', '.'], '', $matches[1])) : null;

                preg_match('/I\.V\.A\. 19% \$\s*([\d,.]+)/', $contenidoFactura, $matches);
                $iva = isset($matches[1]) ? floatval(str_replace([',', '.'], '', $matches[1])) : null;

                preg_match('/TOTAL \$\s*([\d,.]+)/', $contenidoFactura, $matches);
                $totalFactura = isset($matches[1]) ? floatval(str_replace([',', '.'], '', $matches[1])) : null;

                // Expresión regular para encontrar la información de cada ítem
                $itemPattern = '/(\S+)\s+(.+?)\s+(\d+)\s+(\d+\.\d+)\s+(\d+\.\d+)\s+\S+/';

                // Buscar todos los elementos que coincidan con el patrón
                preg_match_all($itemPattern, $contenidoFactura, $matches, PREG_SET_ORDER);



                // Almacenar la información en la tabla detalle_factura
                $detalleFactura = new DetalleFactura();
                $detalleFactura->factura_id = $factura->id;
                $detalleFactura->nombre_cliente = $nombreCliente;
                $detalleFactura->rut_cliente = $rutCliente;
                $detalleFactura->fecha_emision = $fechaEmisionCarbon;
                $detalleFactura->monto_neto = $montoNeto; // No hay información en el ejemplo proporcionado
                $detalleFactura->iva = $iva; // No hay información en el ejemplo proporcionado
                $detalleFactura->total_factura = $totalFactura;
                $detalleFactura->save();

                // Resto del código...

                return back()->with('success', 'Factura subida correctamente');
            } catch (\Exception $e) {
                // Manejar errores...
                dd($e->getMessage(), $e->getTraceAsString());
                return back()->with('error', 'Error al guardar la factura');
            }

        }

        return back()->with('error', 'No se subió ningún archivo PDF.');
    }

    public function descargarPdf($id = null)
    {
        $factura = Factura::find($id);

        if (!$factura) {
            return redirect()->back()->with('error', 'Factura no encontrada.');
        }

        $nombreArchivo = $factura->nombre_archivo;
        $rutaArchivo = public_path('archivos/' . $nombreArchivo . '.pdf');

        if (file_exists($rutaArchivo)) {
            return response()->file($rutaArchivo, ['Content-Type' => 'application/pdf']);
        }

        return back()->with('error', 'No se encontró el archivo PDF para descargar.');
    }

    public function leerContenidoPDF($id)
    {
        $factura = Factura::find($id);

        if (!$factura) {
            return "Factura no encontrada";
        }

        $nombreArchivo = $factura->nombre_archivo;
        $rutaArchivo = public_path('archivos/' . $nombreArchivo . '.pdf');

        if (file_exists($rutaArchivo)) {
            return response()->file($rutaArchivo, ['Content-Type' => 'application/pdf']);
        }

        return "PDF no encontrado";
    }
}
