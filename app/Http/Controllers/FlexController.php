<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Factura;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use TCPDF;
use App\Models\PdfDocument;
use Illuminate\Support\Facades\Response;
use App\Models\DetalleFactura;
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

     function SeguimientoClientes(){
        $authenticated_user = Auth::user();
        return view('vistas.sClientes.seguimiento')->with(['user' => $authenticated_user,]);
     }
     function SeguimientoProductos(){
        $authenticated_user = Auth::user();
        return view('vistas.sProductos.seguimiento')->with(['user' => $authenticated_user,]);
     }
     function SeguimientoProveedores(){
        $authenticated_user = Auth::user();
        return view('vistas.sProveedores.seguimiento')->with(['user' => $authenticated_user,]);
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

                preg_match('/Fecha Emision: (.+?)\R/', $contenidoFactura, $matches);
                $fechaEmision = isset($matches[1]) ? trim($matches[1]) : '';

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

                // Iterar sobre los resultados y guardar en la base de datos
                foreach ($matches as $match) {
                    $codigo = $match[1];
                    $descripcion = $match[2];
                    $cantidad = $match[3];
                    $precio = str_replace(',', '', $match[4]); // Reemplazar comas si es necesario

                    // Crear un nuevo registro en la tabla detalle_factura para cada ítem
                    $detalleItem = new DetalleFactura();
                    $detalleItem->factura_id = $factura->id;
                    $detalleItem->nombre_cliente = $nombreCliente;
                    $detalleItem->rut_cliente = $rutCliente;
                    $detalleItem->fecha_emision = $fechaEmision;
                    $detalleItem->codigo = $codigo;
                    $detalleItem->descripcion = $descripcion;
                    $detalleItem->cantidad = $cantidad;
                    $detalleItem->precio = $precio;
                    // Otros campos...
                    $detalleItem->save();
                }

                // Almacenar la información en la tabla detalle_factura
                $detalleFactura = new DetalleFactura();
                $detalleFactura->factura_id = $factura->id;
                $detalleFactura->nombre_cliente = $nombreCliente;
                $detalleFactura->rut_cliente = $rutCliente;
                $detalleFactura->fecha_emision = $fechaEmision;
                $detalleFactura->monto_neto = $montoNeto; // No hay información en el ejemplo proporcionado
                $detalleFactura->iva = $iva; // No hay información en el ejemplo proporcionado
                $detalleFactura->total_factura = $totalFactura;
                $detalleFactura->save();
                // Resto del código...

                return back()->with('success', 'Factura subida correctamente');
            } catch (\Exception $e) {
                // Manejar errores...

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
