create procedure actualizar_inv_pres(IN presetId int, IN movConcep int, IN cant int)
  begin
    /*
    procedimiento que se utiliza para actualizar el inventario de una presentacion luego de un insert y un update 
    en la tabla de movimiento_productos
    */
    set @tipo = (select TipoMovimiento from movimiento_conceptos where MovimientoConceptoId = movConcep);
    if @tipo = 'Entrada'
    then
      update inventarios set Cantidad = Cantidad + cant where PresentacionId = presetId;
    elseif @tipo = 'Salida'
      then
        update inventarios set Cantidad = Cantidad - cant where PresentacionId = presetId;
    end if;
  end;


