create procedure reporte_mejor_cliente(IN fechaInicio date, IN fechaFin date)
  begin
    select a.ClienteId,
           e.EmpresaNombre,
           mc.Nombre,
           mc.TipoMovimiento,
           count(ClienteId) as cantidad_movimientos,
           sum(Monto)       as total
    from movimiento_productos a
           inner join presentaciones p on a.PresentacionId = p.PresentacionId
           inner join productos p2 on p.ProductoId = p2.ProductoId
           inner join activos a2 on p.ActivoId = a2.ActivoId
           inner join empresas e on a.ClienteId = e.EmpresaId
           inner join movimiento_conceptos mc on a.MovimientoConceptoId = mc.MovimientoConceptoId
    where a.Fecha >= fechaInicio
      and a.Fecha <= fechaFin
    group by a.ClienteId, e.EmpresaNombre, mc.Nombre, mc.TipoMovimiento
    order by cantidad_movimientos desc;
  end;


