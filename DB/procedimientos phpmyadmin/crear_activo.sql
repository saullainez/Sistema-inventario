DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_activo`(IN nombre varchar(100), IN descripcion varchar(250), IN tipo varchar(50))
begin
  
 declare exit handler for sqlexception
    begin
      get diagnostics condition 1
      @mensaje = MESSAGE_TEXT;

      select @mensaje as error;
      rollback ;

    end;

  insert into activos(ActivoNombre, ActivoDescripcion, TipoActivo, created_at, updated_at)
  values(nombre,descripcion,tipo,now(),now());
  set @id = (select max(ActivoId) from activos);
  insert into inventario_activos(ActivoId,Cantidad,created_at,updated_at)
  values(@id,0,now(),now());

    select * from activos where ActivoId = @id;
end$$
DELIMITER ;