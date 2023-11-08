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
                $factura = new Factura();
                $factura->nombre_archivo = $request->input('nombre_archivo');
                $factura->pdf_contenido = file_get_contents($archivo->getRealPath());

                $factura->save();

                // Convierte el contenido binario a texto
                $pdfText = Pdf::getText($factura->pdf_contenido);

                        // Expresiones regulares para buscar y extraer datos
                $nombreEmpresaPattern = '/(?<=SEÑOR\(ES\): )(.+)(?=\nR\.U\.T\.:)/';
                $rutPattern = '/R\.U\.T\.:\s*([\d\.-]+)\s/';
                $numeroFacturaPattern = '/FACTURA ELECTRONICA\nNº(\d+)/';
                $fechaEmisionPattern = '/Fecha Emision: (\d+\s\w+\s\d+)/';
                $nombreProductoPattern = '/- MATERIALES HIDRAULICOS\n(.*?)\n\nForma de Pago:/';
                $montoNetoPattern = '/MONTO NETO \$ ([\d.,]+)/';
                $ivaPattern = '/I\.V\.A\. 19% \$ ([\d.,]+)/';
                $impuestoAdicionalPattern = '/IMPUESTO ADICIONAL \$ ([\d.,]+)/';
                $totalPattern = '/TOTAL \$ ([\d.,]+)/';

                // Inicializa el arreglo $data
                $data = [
                    'numero_factura' => null,
                    'fecha_emision' => null,
                    'nombre_empresa' => null,
                    'rut' => null,
                    'nombre_producto' => null,
                    'monto_neto' => null,
                    'iva' => null,
                    'impuesto_adicional' => null,
                    'total' => null,
                ];

                // Busca y extrae los datos
                if (preg_match($nombreEmpresaPattern, $pdfText, $matches)) {
                    $data['nombre_empresa'] = $matches[1];
                }
                if (preg_match($rutPattern, $pdfText, $matches)) {
                    $data['rut'] = $matches[1];
                }
                if (preg_match($numeroFacturaPattern, $pdfText, $matches)) {
                    $data['numero_factura'] = $matches[1];
                }
                if (preg_match($fechaEmisionPattern, $pdfText, $matches)) {
                    $data['fecha_emision'] = $matches[1];
                }
                if (preg_match($nombreProductoPattern, $pdfText, $matches)) {
                    $data['nombre_producto'] = $matches[1];
                }
                if (preg_match($montoNetoPattern, $pdfText, $matches)) {
                    $data['monto_neto'] = str_replace(',', '', $matches[1]);
                }
                if (preg_match($ivaPattern, $pdfText, $matches)) {
                    $data['iva'] = str_replace(',', '', $matches[1]);
                }
                if (preg_match($impuestoAdicionalPattern, $pdfText, $matches)) {
                    $data['impuesto_adicional'] = str_replace(',', '', $matches[1]);
                }
                if (preg_match($totalPattern, $pdfText, $matches)) {
                    $data['total'] = str_replace(',', '', $matches[1]);
                }

                // Crea un nuevo registro en la tabla "detalle_factura" utilizando DetalleFactura::create($data)
                DetalleFactura::create($data);

                return back()->with('success', 'Factura subida correctamente');
            } catch (\Exception $e) {
                logger()->error('Error al guardar la factura: ' . $e->getMessage());
                return back()->with('error', 'Error al guardar la factura');
            }
        }

        return back()->with('error', 'No se subió ningún archivo PDF.');
    }

    public function descargarPdf($id = null){
        $factura = Factura::find($id);

        if (!$factura) {
            return redirect()->back()->with('error', 'Factura no encontrada.');
        }

        $pdfContent = $factura->pdf_contenido;
        $nombreArchivo = $factura->nombre_archivo;

        if ($pdfContent) {
            return response($pdfContent)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $nombreArchivo . '"');
        }

        return back()->with('error', 'No se encontró contenido PDF para descargar.');
    }

    public function leerContenidoPDF($id) {
        $pdf_contenido = Factura::find($id);

        if (!$pdf_contenido) {
            return "Factura no encontrada";
        }

        $pdfContent = $pdf_contenido->pdf_contenido;

        if ($pdfContent) {
            // Convertir el contenido del blob a un PDF y mostrarlo en el navegador
            return Response::make($pdfContent, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="factura.pdf"',
            ]);
        }

        return "PDF no encontrado";
    }
}
