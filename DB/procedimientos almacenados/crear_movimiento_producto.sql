create procedure crear_mov_pro(IN presetId  int, IN descrip text, IN fech date, IN anio int, IN cant int,
                               IN cliente   int, IN movConcep int, IN mont double)
  begin

    declare exit handler for sqlexception
    begin
      get diagnostics condition 1
      @mensaje = MESSAGE_TEXT;

      select @mensaje as error;
      rollback;

    end;

    insert into movimiento_productos (PresentacionId,
                                      Descripcion,
                                      Fecha,
                                      AnioCosecha,
                                      Cantidad,
                                      ClienteId,
                                      MovimientoConceptoId,
                                      Monto,
                                      created_at,
                                      updated_at)
    values (presetId, descrip, fech, anio, cant, cliente, movConcep, mont, now(), now());

    call actualizar_inv_pres(presetId, movConcep, cant);
    select *
    from movimiento_productos
    where MovimientoProductoId = (select max(MovimientoProductoId) from movimiento_productos);

  end;


