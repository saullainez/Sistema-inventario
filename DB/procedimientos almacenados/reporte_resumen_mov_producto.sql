create procedure reporte_resumen_mov_producto(IN fechaInicio date, IN fechaFin date, IN tipo varchar(40))
  begin
    select a.PresentacionId,
           p2.ProductoNombre,
           a2.ActivoNombre,
           a.MovimientoConceptoId,
           mc.Nombre,
           mc.TipoMovimiento,
           count(a.MovimientoConceptoId) cantidad_movimientos,
           sum(monto)                    total_movimiento
    from movimiento_productos a
           inner join movimiento_conceptos mc on a.MovimientoConceptoId = mc.MovimientoConceptoId
           inner join empresas e on a.ClienteId = e.EmpresaId
           inner join presentaciones p on a.PresentacionId = p.PresentacionId
           inner join activos a2 on p.ActivoId = a2.ActivoId
           inner join productos p2 on p.ProductoId = p2.ProductoId
    where mc.TipoMovimiento = tipo
      and (a.Fecha >= fechaInicio and a.Fecha <= fechaFin)
    group by a.PresentacionId, p2.ProductoNombre, a2.ActivoNombre, a.MovimientoConceptoId, mc.Nombre, mc.TipoMovimiento
    order by a.PresentacionId asc;
  end;


