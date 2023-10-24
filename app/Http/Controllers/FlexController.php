<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Factura;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
     function RespaldoFacturas(){
        $authenticated_user = Auth::user();
        return view('vistas.rFactura.respaldo')->with(['user' => $authenticated_user,]);
     }




     public function subirFactura(Request $request)
    {
        $request->validate([
            'archivo_pdf' => 'required|mimes:pdf',
        ]);

        if ($request->hasFile('archivo_pdf')) {
            $archivo = $request->file('archivo_pdf');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();

            // Almacena el archivo en la carpeta 'pdfs' en el almacenamiento local
            $archivo->storeAs('pdfs', $nombreArchivo);

            // Crea una instancia del modelo Factura
            $factura = new Factura();
            $factura->pdf_contenido = $nombreArchivo;

            // Guarda la instancia de Factura en la base de datos
            $factura->save();

            return view('vistas.rFactura.respaldo')
                ->with('success', 'PDF subido exitosamente.');
        }

        return back()->with('error', 'No se subió ningún archivo PDF.');
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
