DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_mov_pro`(IN presId  int, IN descrip text, IN fech date, IN cant int, IN anio int,
                                    IN cliente int, IN movConcep int, IN mont double, IN movProId int)
begin
   declare exit handler for sqlexception
    begin
      get diagnostics condition 1
      @mensaje = MESSAGE_TEXT;

      select @mensaje as error;
      rollback ;

    end;

    set @error = (select count(*) from movimiento_productos where MovimientoProductoId = movProId);
    if @error > 0 then
      update movimiento_productos set
                                      PresentacionId = presId,
                                      Descripcion = descrip,
                                      Fecha = fech,
                                      Cantidad = cant,
                                      AnioCosecha = anio,
                                      ClienteId = cliente,
                                      Monto = mont,
                                      MovimientoConceptoId = movConcep
      where MovimientoProductoId = movProId;
      call revertir_inv_pres(movProId);
      call actualizar_inv_pres(presId,movConcep,cant);
      select * from movimiento_productos where MovimientoProductoId = movProId;
    else
      select "el id no exite" as error;
    end if;

  end$$
DELIMITER ;