DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_mov_act`(IN actId  int, IN fech date, IN descrip text, IN cant int, IN mont double, IN prov int,
                               IN movCon int)
begin
    declare exit handler for sqlexception
    begin
      get diagnostics condition 1
      @mensaje = MESSAGE_TEXT;

      select @mensaje as error;
      rollback ;

    end;
    
    /*set @contador = (select count(*) from movimiento_activos);*/

    insert into movimiento_activos(ActivoId, Descripcion,Fecha, Cantidad, Monto, ProveedorId, MovimientoConceptoId, created_at, updated_at)
    values (actId, descrip, fech,cant,mont,prov,movCon,now(),now());
    call actualizar_inv_act(actId,movCon,cant);
    select * from movimiento_activos
    where MovimientoActivoId = (select max(MovimientoActivoId) from movimiento_activos);

    /*
    set @contador2 = (select  count(*) from movimiento_activos);


    if @contador < @contador2 then

    end if;
    */
    
  end$$
DELIMITER ;