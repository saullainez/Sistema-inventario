DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_presentacion`(IN presentId int, IN actId int, IN productId int)
begin
   declare exit handler for sqlexception
    begin
      get diagnostics condition 1
      @mensaje = MESSAGE_TEXT;

      select @mensaje as error;
      rollback ;

    end;
    insert into presentaciones(PresentacionId, ActivoId, ProductoId, created_at, updated_at)
    VALUES(presentId,actId,productId,now(),now());
    insert into inventarios(PresentacionId,Cantidad,created_at,updated_at)
    values (presentId,0,now(),now());

    select * from presentaciones where PresentacionId = presentId;
  end$$
DELIMITER ;