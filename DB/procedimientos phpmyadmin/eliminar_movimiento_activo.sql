DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_mov_act`(IN movActId int)
begin
   declare exit handler for sqlexception
    begin
      get diagnostics condition 1
      @mensaje = MESSAGE_TEXT;

      select @mensaje as error;
      rollback ;

    end;
    set @error = (select count(*) from movimiento_activos where MovimientoActivoId = movActId);
    if @error > 0 then

      set @cantidad = (select Cantidad from movimiento_activos where MovimientoActivoId = movActId);
      set @activo = (select ActivoId from movimiento_activos where MovimientoActivoId = movActId);
      set @tipo = (select MovimientoConceptoId from movimiento_activos where MovimientoActivoId = movActId);

      delete from movimiento_activos where MovimientoActivoId = movActId;
      call revertir_inv_act(@cantidad,@activo,@tipo);
      set @elimino = true;
      select @elimino as elimino;
    else
      select "El id no existe" as error;
    end if;

  end$$
DELIMITER ;