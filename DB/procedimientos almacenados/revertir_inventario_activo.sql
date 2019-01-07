create procedure revertir_inv_act(IN cant int, IN activo int, IN tipo int)
  begin
    /*
    procedimiento que sirve para actualizar el inventario de activos al momento de hacer una actualizacion
    o eliminacion de un registro en la tabla de movimiento_activos.
    al momento de ejecutar el procedimiento respectivo para actualizar o eliminar un registro se ejecutara primero
    este procedimiento, ya que este hara una reversion en el inventario.
    */

    set @tipo = (select TipoMovimiento from movimiento_conceptos where MovimientoConceptoId = tipo);

    if @tipo = 'Entrada'
    then
      update inventario_activos set Cantidad = Cantidad - cant where ActivoId = activo;
    elseif @tipo = 'Salida'
      then
        update inventario_activos set Cantidad = Cantidad + cant where ActivoId = activo;
    end if;
    show errors;
  end;


