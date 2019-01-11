DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `revertir_inv_pres`(IN presentacion int, IN movConcep int, IN cantidad int)
begin
    set @tipo = (select TipoMovimiento from movimiento_conceptos where MovimientoConceptoId = movConcep);
    if @tipo = 'Entrada' then
      update inventarios set Cantidad = Cantidad - cantidad where PresentacionId = presentacion;
     elseif @tipo = 'Salida' then
       update inventarios set Cantidad = Cantidad + cantidad where PresentacionId = presentacion;
    end if;

  end$$
DELIMITER ;