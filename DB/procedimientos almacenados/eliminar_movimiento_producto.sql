create procedure eliminar_mov_pro(IN movProId int)
  begin
    declare exit handler for sqlexception
    begin
      get diagnostics condition 1
      @mensaje = MESSAGE_TEXT;

      select @mensaje as error;
      rollback;

    end;
    set @error = (select count(*) from movimiento_productos where MovimientoProductoId = movProId);
    if @error > 0
    then
      set @cantidad = (select Cantidad from movimiento_productos where MovimientoProductoId = movProId);
      set @presentacion = (select PresentacionId from movimiento_productos where MovimientoProductoId = movProId);
      set @tipo = (select MovimientoConceptoId from movimiento_productos where MovimientoProductoId = movProId);

      delete from movimiento_productos where MovimientoProductoId = movProId;
      call revertir_inv_pres(@presentacion, @tipo, @cantidad);
      set @elimino = true;
      select @elimino as elimino;
    else
      select "el id no existe" as error;
    end if;
  end;


