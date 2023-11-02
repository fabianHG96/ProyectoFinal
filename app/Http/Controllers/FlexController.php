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
