<?php

use Illuminate\Database\Seeder;
use App\MovimientoConcepto;

class MovConceptoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovimientoConcepto::create([
            'Nombre'            => 'Compra',
            'TipoMovimiento'    => 'Entrada',
        ]);
        MovimientoConcepto::create([
            'Nombre'            => 'Venta',
            'TipoMovimiento'    => 'Salida',
        ]);
        MovimientoConcepto::create([
            'Nombre'            => 'Inventario inicial',
            'TipoMovimiento'    => 'Entrada',
        ]);
        MovimientoConcepto::create([
            'Nombre'            => 'Devolución ',
            'TipoMovimiento'    => 'Entrada',
        ]);
        MovimientoConcepto::create([
            'Nombre'            => 'Donación',
            'TipoMovimiento'    => 'Salida',
        ]);
        MovimientoConcepto::create([
            'Nombre'            => 'Degustacion',
            'TipoMovimiento'    => 'Salida',
        ]);
        MovimientoConcepto::create([
            'Nombre'            => 'Producto dañado',
            'TipoMovimiento'    => 'Salida',
        ]);
    }
}
