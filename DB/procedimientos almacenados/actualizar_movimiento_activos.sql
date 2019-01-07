create procedure actualizar_mov_act(IN actId int, IN fech date, IN descrip text, IN cant int, IN mont double,
                                    IN prov  int, IN movCon int, IN movId int)
  begin

    declare exit handler for sqlexception
    begin
      get diagnostics condition 1
      @mensaje = MESSAGE_TEXT;

      select @mensaje as error;
      rollback;

    end;

    /*
 primero que todo, se deben revertir los cambios efectuados en el inventario de activos,
 las actualizaciones es para correcciones de algun movimiento mal creado, asi que primero se deben de
 revertir los cambios relaizados en inventario por el movimiento que se va a modificar.
 Una vez hecho esto, se procede a hacer la actualizacion en la tabla de movimientos y la respectiva
 actualizacion en inventario.
 */
    set @existe = (select count(*) from movimiento_activos where MovimientoActivoId = movId);

    if @existe != 0
    then
      set @cantidad = (select Cantidad from movimiento_activos where MovimientoActivoId = movId);
      set @activo = (select ActivoId from movimiento_activos where MovimientoActivoId = movId);
      set @tipo = (select MovimientoConceptoId from movimiento_activos where MovimientoActivoId = movId);

      update movimiento_activos
      set ActivoId             = actId,
          Fecha                = fech,
          Descripcion          = descrip,
          Cantidad             = cant,
          Monto                = mont,
          ProveedorId          = prov,
          MovimientoConceptoId = movCon
      where MovimientoActivoId = movId;

      /*actualizar el inventario*/

      call revertir_inv_act(@cantidad, @activo, @tipo);

      call actualizar_inv_act(actId, movCon, cant);
      select * from movimiento_activos where MovimientoActivoId = movId;
    else
      select "el id no existe" as error;
    end if;

  end;


