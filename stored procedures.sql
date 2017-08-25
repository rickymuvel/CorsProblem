DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getUsuarios` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getUsuarios`()
BEGIN
  SELECT 
	us.id, us.dni, us.ap_paterno, us.ap_materno, us.nombres, us.fecnac, us.est_civil, us.fec_ingreso, 
    us.movil, us.fijo, us.direccion, us.idubigeo, us.email_corp, us.email_per, us.user, 
    us.contacto_emergencia, us.telef_contacto, per.perfil, per.id as id_perfil, us.turno,
	CONCAT(ub.dpto, "/", ub.prov, "/", ub.dist) as distrito, ub.idubigeo as ubigeo 
  FROM ubigeo ub
  INNER JOIN users us ON  ub.idubigeo=us.idubigeo
  INNER JOIN perfiles per ON us.id_perfil=per.id ORDER BY us.id ASC;
END $$
DELIMITER ;


DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getUsuario` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getUsuario`( IN _id_usuario char(10))
BEGIN
  SELECT 
	us.id, us.dni, us.ap_paterno, us.ap_materno, us.nombres, us.fecnac, us.est_civil, us.fec_ingreso, 
	us.movil, us.fijo, us.direccion, us.idubigeo, us.email_corp, us.email_per, us.user, 
	us.contacto_emergencia, us.telef_contacto, per.perfil, per.id, us.turno,
	CONCAT(ub.dpto, "/", ub.prov, "/", ub.dist) as distrito, ub.idubigeo as ubigeo 
  FROM ubigeo ub
	INNER JOIN users us ON  ub.idubigeo=us.idubigeo
	INNER JOIN perfiles per ON us.id_perfil=per.id
  WHERE us.id=_id_usuario ORDER BY us.id ASC;
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getProveedores` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getProveedores`()
BEGIN
  SELECT 
	p.*, r.nombre as rubro
  FROM 
	proveedores p INNER JOIN rubros r ON p.id_rubro=r.id ORDER BY p.id ASC;
		
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getCarteras` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getCarteras`()
BEGIN
  SELECT 
	c.*, p.razon_social, tc.tipo_cartera
  FROM 
	proveedores p 
    INNER JOIN carteras c ON p.id = c.id_proveedor
    INNER JOIN tipos_cartera tc ON c.id_tipo_cartera=tc.id ORDER BY c.id ASC;
		
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getProductos` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getProductos`()
BEGIN
  SELECT 
	p.*, tp.tipo_producto
  FROM 
	productos p 
    INNER JOIN tipo_productos tp ON p.id_tipo_producto=tp.id ORDER BY p.id ASC;
		
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getSegmentos` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getSegmentos`()
BEGIN
  SELECT s.*, c.cartera FROM segmentos s INNER JOIN carteras c ON s.id_cartera=c.id ORDER BY s.id ASC;
		
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getResultados` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getResultados`()
BEGIN
  SELECT r.*, tr.tipo_resultado 
  FROM resultados r 
  INNER JOIN tipo_resultados tr 
		ON r.id_tipo_resultado=tr.id
  ORDER BY r.id ASC;
END $$
DELIMITER ;


DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getEqTrabajoCartera` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getEqTrabajoCartera`()
BEGIN
  SELECT 
	etc.*,
    ca.cartera,
    et.equipo_trabajo as equipo,
    pe.perfil,
    concat_ws(us.nombres, us.ap_paterno, us.ap_materno) as responsable,
    pr.razon_social as proveedor,
    se.nombre as segmento
  FROM equipo_trabajo_cartera etc 
		INNER JOIN equipos_trabajo et ON etc.id_equipo=et.id
        INNER JOIN users us ON etc.id_usuario=us.id
		INNER JOIN carteras ca ON etc.id_cartera=ca.id
        INNER JOIN perfiles pe ON etc.id_perfil=pe.id
        INNER JOIN proveedores pr ON etc.id_proveedor=pr.id
        INNER JOIN segmentos se ON etc.id_segmento=se.id
  ORDER BY etc.id ASC;
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getProductoCartera` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getProductoCartera`()
BEGIN
  SELECT pc.*, p.producto, pr.razon_social, ca.cartera
	FROM producto_cartera pc 
	INNER JOIN productos p ON pc.id_producto=p.id
    INNER JOIN proveedores pr ON pc.id_proveedor=pr.id
    INNER JOIN carteras ca ON pc.id_cartera=ca.id
	ORDER BY pc.id ASC;
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getProductoProveedor` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getProductoProveedor`()
BEGIN
  SELECT pp.*, p.producto, pr.razon_social
	FROM producto_proveedores pp
	INNER JOIN productos p ON pp.id_producto=p.id
    INNER JOIN proveedores pr ON pp.id_proveedor=pr.id
 ORDER BY pp.id ASC;
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getTipoContactoResultado` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getTipoContactoResultado`()
BEGIN
  SELECT tcr.*, r.resultado, tc.tipo_contacto
	FROM tipo_contacto_resultados tcr
	INNER JOIN resultados r ON tcr.id_resultado=r.id
    INNER JOIN tipos_contacto tc ON tcr.id_tipo_contacto=tc.id
  ORDER BY tcr.id ASC;
END $$
DELIMITER ;


DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getPaletaResultados` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getPaletaResultados`()
BEGIN
  SELECT pr.*, 
	  p.razon_social,
	  c.cartera,
	  r.resultado,
	  j.justificacion
  FROM paleta_resultados pr
  INNER JOIN proveedores p ON pr.id_proveedor=p.id
  INNER JOIN carteras c ON pr.id_cartera=c.id
  INNER JOIN resultados r ON pr.id_resultado=r.id
  INNER JOIN justificaciones j ON pr.id_justificacion=j.id
  ORDER BY pr.id ASC;
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getMenuContenedorBase` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getMenuContenedorBase`()
BEGIN
  SELECT pmc.*,p.perfil
  FROM perfil_menu_contenedores pmc
	INNER JOIN perfiles p ON pmc.id_perfil=p.id
  ORDER BY pmc.id ASC;
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getMenuContenedor` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getMenuContenedor`()
BEGIN
    SELECT mc.id, 
		   mc.nombre as menu,
           mc.imagen,
           mc.nivel,
           mc.id_menu_contenedor,
           pmc.nombre as nombre_base           
  FROM menus_contenedor mc 
	INNER JOIN perfil_menu_contenedores pmc ON mc.id_perfil_menu_contenedor = pmc.id
  ORDER BY mc.id ASC;
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getMenuContenedorXNivel` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getMenuContenedorXNivel`(IN _nivel int(1))
BEGIN
    SELECT mc.id, 
		   mc.nombre as menu,
           mc.imagen,
           mc.nivel,
           mc.id_menu_contenedor,
           pmc.nombre as nombre_base           
  FROM menus_contenedor mc 
	INNER JOIN perfil_menu_contenedores pmc ON mc.id_perfil_menu_contenedor = pmc.id
  WHERE mc.nivel = _nivel
  ORDER BY mc.id ASC;
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getMenuContenedorItem` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getMenuContenedorItem`()
BEGIN
SELECT 
	mci.id, 
    mc.nombre as contenedor, 
    mi.nombre as item,
    pmc.nombre as nombre_base
FROM ventas.menu_contenedor_items mci
	INNER JOIN ventas.menus_contenedor mc ON mci.id_menu_contenedor=mc.id
	INNER JOIN ventas.menu_items mi ON mci.id_menu_item=mi.id
    INNER JOIN ventas.perfil_menu_contenedores pmc ON pmc.id = mc.id_perfil_menu_contenedor
ORDER BY ID ASC;
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getMenu` $$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_getMenu`(IN _perfil int(1))
BEGIN
SELECT 
	mci.id, 
    mc.nombre as contenedor,
    mi.nombre as item
FROM ventas.menu_contenedor_items mci
	INNER JOIN ventas.menus_contenedor mc ON mci.id_menu_contenedor=mc.id
    INNER JOIN ventas.menu_items mi ON mci.id_menu_item=mi.id
    INNER JOIN ventas.perfil_menu_contenedores pmc ON mc.id_perfil_menu_contenedor=pmc.id
WHERE pmc.id_perfil=_perfil
ORDER BY contenedor ASC;
END $$
DELIMITER ;