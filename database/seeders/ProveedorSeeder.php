<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proveedor::create([
            'nombre' => 'Comercial Hidrotek Limitada',
            'rut' => '76.276.063-9',
            'pais' => 'Chile',
            'region' => 'Region del Bio bio',
            'direccion' => 'Galvarino 1861 Barrio Norte, Concepcion',
            'telefono' => '413361761',
            'email' => 'AMUNOZ@HIDROTEK.CL',
            'rubro' => 'COMMIP REP D USO INDFAB Y REP DE CIL OL Y NEUM REPY MANTMAQ',
        ]);

        Proveedor::create([
            'nombre' => 'Undurraga Tecnica y Comercial S.A. (UTEGA)',
            'rut' => '76.725.870-4',
            'pais' => 'Chile',
            'region' => 'Región Metropolitana de Santiago',
            'direccion' => 'Carmen N2165',
            'telefono' => '227217900',
            'email' => 'ventas@utecsa.cl',
            'rubro' => 'Fabricacion de equipo de propulsion de fluidos',
        ]);

        Proveedor::create([
            'nombre' => 'Suministros Hidraulicos Cristian Arias B Empresa Individual de respon',
            'rut' => '76.968.333-K',
            'pais' => 'Chile',
            'region' => 'Región Metropolitana de Santiago',
            'direccion' => 'Las Tinajas 2756 Los Portales, Maipu',
            'telefono' => 'Desconocido',
            'email' => 'venta@suministroshidraulicos.cl',
            'rubro' => 'Ventas de productos hidraulicos, maquinarias y ferreteria',
        ]);

        Proveedor::create([
            'nombre' => 'Neuro-Mann',
            'rut' => '77.271.360-6',
            'pais' => 'Chile',
            'region' => 'Region del Bio Bio',
            'direccion' => 'Quinta Nacagua Lote 5 - Sector Duqueco, Los Angeles',
            'telefono' => '+56432770001',
            'email' => 'neuromann@ventas.cl',
            'rubro' => 'Importacion, Distribucion, Ventas y Comercializacion de Repuestos industriales',
        ]);
    }
}
