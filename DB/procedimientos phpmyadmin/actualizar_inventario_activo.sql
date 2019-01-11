DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_inv_act`(in actId int,in movCon int, in cant int)
begin
    /*
    procedimiento que se ejecutara luego de haber creado o actualizado un nuevo registro en la tabla de
    movimiento_activos, este actualiza la tabla de inventario_activos luego de haber realizado el insert o update
    y actualiza la cantidad de inventario correspondiente al activo que se ha especificado.
    */
     set @tipo = (select TipoMovimiento from movimiento_conceptos where MovimientoConceptoId = movCon);
     if @tipo = 'Entrada' then
        update inventario_activos set Cantidad = Cantidad + cant where ActivoId = actId;
      elseif @tipo = 'Salida' then
        update  inventario_activos set Cantidad = Cantidad - cant where ActivoId = actId;
      end if ;
  end$$
DELIMITER ;