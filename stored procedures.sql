#sp_getUsuarios

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getUsuarios` $$
CREATE DEFINER=`homestead`@`%` PROCEDURE `sp_getUsuarios`()
BEGIN
  SELECT 
	us.id, us.dni, us.ap_paterno, us.ap_materno, us.nombres, us.fecnac, us.est_civil, us.fec_ingreso, 
    us.movil, us.fijo, us.direccion, us.idubigeo, us.email_corp, us.email_per, us.login, 
    us.contacto_emergencia, us.telef_contacto, per.perfil, per.id as id_perfil, us.turno,
	CONCAT(ub.dpto, "/", ub.prov, "/", ub.dist) as distrito, ub.idubigeo as ubigeo 
  FROM ubigeo ub
  INNER JOIN usuarios us ON  ub.idubigeo=us.idubigeo
  INNER JOIN perfiles per ON us.id_perfil=per.id;
END $$
DELIMITER ;

#CALL sp_getUsuarios();
#sp_getUsuario
DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getUsuario` $$
CREATE DEFINER=`homestead`@`%` PROCEDURE `sp_getUsuario`( IN _id_usuario char(10))
BEGIN
  SELECT 
	us.id, us.dni, us.ap_paterno, us.ap_materno, us.nombres, us.fecnac, us.est_civil, us.fec_ingreso, 
	us.movil, us.fijo, us.direccion, us.idubigeo, us.email_corp, us.email_per, us.login, 
	us.contacto_emergencia, us.telef_contacto, per.perfil, per.id, us.turno,
	CONCAT(ub.dpto, "/", ub.prov, "/", ub.dist) as distrito, ub.idubigeo as ubigeo 
  FROM ubigeo ub
	INNER JOIN usuarios us ON  ub.idubigeo=us.idubigeo
	INNER JOIN perfiles per ON us.id_perfil=per.id
  WHERE us.id=_id_usuario;
END $$
DELIMITER ;

#call sp_getProveedores()

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getProveedores` $$
CREATE DEFINER=`homestead`@`%` PROCEDURE `sp_getProveedores`()
BEGIN
  SELECT 
	p.*, r.nombre as rubro
  FROM 
	proveedores p INNER JOIN rubros r ON p.id_rubro=r.id;
		
END $$
DELIMITER ;

#call sp_getProveedores()


#call sp_getCarteras()
DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getCarteras` $$
CREATE DEFINER=`homestead`@`%` PROCEDURE `sp_getCarteras`()
BEGIN
  SELECT 
	c.*, p.razon_social, tc.tipo_cartera
  FROM 
	proveedores p 
    INNER JOIN carteras c ON p.id = c.id_proveedor
    INNER JOIN tipos_cartera tc ON c.id_tipo_cartera=tc.id;
		
END $$
DELIMITER ;

#call sp_getCarteras()


DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getProductos` $$
CREATE DEFINER=`homestead`@`%` PROCEDURE `sp_getProductos`()
BEGIN
  SELECT 
	p.*, tp.tipo_producto
  FROM 
	productos p 
    INNER JOIN tipo_productos tp ON p.id_tipo_producto=tp.id;
		
END $$
DELIMITER ;

#call sp_getProductos()

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getSegmentos` $$
CREATE DEFINER=`homestead`@`%` PROCEDURE `sp_getSegmentos`()
BEGIN
  SELECT s.*, c.cartera FROM segmentos s INNER JOIN carteras c ON s.id_cartera=c.id;
		
END $$
DELIMITER ;

#call sp_getSegmentos()