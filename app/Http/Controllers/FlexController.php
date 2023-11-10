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
                // Agregar un identificador único al nombre del archivo
                $nombreArchivo = $request->input('nombre_archivo') . '_' . uniqid();
                $rutaArchivo = 'archivos/' . $nombreArchivo . '.' . $archivo->getClientOriginalExtension();

                $archivo->move(public_path('archivos'), $rutaArchivo);

                // Crear el registro de la factura con el nombre del archivo
                $factura = new Factura();
                $factura->nombre_archivo = $nombreArchivo;
                $factura->ruta_archivo = $rutaArchivo;
                $factura->save();

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
