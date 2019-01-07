<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'tipo-bebida',
        'tipo-bebida/*',
        'producto',
        'producto/*',
        'presentacion',
        'presentacion/*',
        'inventario',
        'inventario/*',
        'inventario-activo',
        'inventario-activo/*',
        'empresa',
        'empresa/*',
        'movimiento-concepto',
        'movimiento-concepto/*',
        'movimiento-producto',
        'movimiento-producto/*',
        'movimiento-activo',
        'movimiento-activo/*',
        'activo',
        'activo/*',

    ];
}
