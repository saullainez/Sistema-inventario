DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reporte_mejor_proveedor`(in fechaInicio date, in fechaFin date)
begin
    select a.ProveedorId, e.EmpresaNombre, mc.Nombre, mc.TipoMovimiento,count(ProveedorId) as cantidad_movimientos, sum(monto) as total
    from movimiento_activos a
    inner join empresas e on a.ProveedorId = e.EmpresaId
    inner join movimiento_conceptos mc on a.MovimientoConceptoId = mc.MovimientoConceptoId
    where a.Fecha >= fechaInicio and a.Fecha <= fechaFin
    group by a.ProveedorId, e.EmpresaNombre,mc.Nombre ,mc.TipoMovimiento
    order by cantidad_movimientos desc, a.MovimientoConceptoId;
  end$$
DELIMITER ;