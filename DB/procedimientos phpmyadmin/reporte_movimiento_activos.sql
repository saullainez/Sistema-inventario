DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reporte_movimiento_activos`(in fechaInicio date, in fechaFin date, in tipo varchar(40))
begin 
    select
           a.MovimientoActivoId, a.ActivoId, a2.ActivoNombre, a.Descripcion, a.Fecha,a.Cantidad, a.Monto,
           a.ProveedorId, e.EmpresaNombre, mc.Nombre, mc.TipoMovimiento
    from movimiento_activos a
    inner join movimiento_conceptos mc on a.MovimientoConceptoId = mc.MovimientoConceptoId
    inner join empresas e on a.ProveedorId = e.EmpresaId
    inner join activos a2 on a.ActivoId = a2.ActivoId
    where mc.TipoMovimiento = tipo and (a.Fecha >= fechaInicio and a.Fecha <= fechaFin) 
    order by a.Fecha asc;
  end$$
DELIMITER ;