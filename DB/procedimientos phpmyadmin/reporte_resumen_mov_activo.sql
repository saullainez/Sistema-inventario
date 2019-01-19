DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reporte_resumen_mov_activo`(IN fechaInicio date, IN fechaFin date, IN tipo varchar(40))
begin 
  
  /*query que muestra el total generado por tipo de movimiento, es un resumen para mostrar cuanto se genera por tipo de movimiento
  se debe establecer el tipo y rango de fechas*/
    select  a.activoId,
        ActivoNombre, a.MovimientoConceptoId, mc.Nombre,mc.TipoMovimiento,
        count(a.MovimientoConceptoId) cantidad_movimientos, sum(monto) total_movimiento
    from movimiento_activos a
    inner join activos a2 on a.ActivoId = a2.ActivoId
    inner join movimiento_conceptos mc on a.MovimientoConceptoId = mc.MovimientoConceptoId
    where mc.TipoMovimiento = tipo and (a.Fecha >= fechaInicio and a.Fecha <= fechaFin)
    group by ActivoId, mc.Nombre,a.MovimientoConceptoId
    order by a.ActivoId asc;  
    
  end$$
DELIMITER ;