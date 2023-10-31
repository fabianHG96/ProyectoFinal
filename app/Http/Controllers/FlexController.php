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



     public function subirFactura(Request $request)
    {
        $request->validate([
            'nombre_archivo' => 'required', // Valida el campo 'nombre_archivo'
            'archivo_pdf' => 'required|mimes:pdf',
        ]);

        if ($request->hasFile('archivo_pdf')) {
            $archivo = $request->file('archivo_pdf');

            // Lee el contenido binario del archivo PDF
            $pdfContenido = file_get_contents($archivo->getRealPath());

            // Crea una instancia del modelo Factura
            $factura = new Factura();
            $factura->nombre_archivo = $request->input('nombre_archivo'); // Captura el nombre desde el formulario
            $factura->pdf_contenido = $pdfContenido;

            // Guarda la instancia de Factura en la base de datos
                try {
                    $factura->save();
                    return back()->with('success', 'Factura subida correctamente');
                } catch (\Exception $e) {
                // Imprimir la excepción
                 dd($e);

                // También puedes registrar la excepción en los registros de Laravel
                // logger()->error($e);

                    return back()->with('error', 'Error al guardar la factura: ' . $e->getMessage());
                }
            }

            return back()->with('error', 'No se subió ningún archivo PDF.');
        }




        function descargarPdf($id = null){
        $factura = Factura::find($id);

         if (!$factura) {
        return redirect()->back()->with('error', 'Factura no encontrada.');
            }

        $pdfContent = $factura->pdf_contenido;
        $nombreArchivo = $factura->nombre_archivo;

            return response()->stream(function () use ($pdfContent) {
            echo $pdfContent;
         }, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => "attachment; filename=\"$nombreArchivo\"",
        ]);
        }

        public function listFactura(){
        $factura = Factura::all();
        return view('vistas.rFactura.list', ['mostrarfactura' => $factura]);
        }



        function leerContenidoPDF($id) {
            $factura = Factura::find($id);

            if (!$factura) {
                return redirect()->back()->with('error', 'Factura no encontrada.');
            }

            $pdfContent = $factura->pdf_contenido;

            // Convierte el contenido binario a base64 para mostrarlo en la vista
            $pdfContentBase64 = base64_encode($pdfContent);

            return view('vistas.rFactura.pdf_view', ['pdfContent' => $pdfContentBase64]);
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


}
