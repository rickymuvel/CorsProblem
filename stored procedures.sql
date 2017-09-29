DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getCarteras` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getCarteras`()
BEGIN
  SELECT 
	c.*, p.razon_social, tc.tipo_cartera
  FROM 
	proveedores p 
    INNER JOIN carteras c ON p.id = c.id_proveedor
    INNER JOIN tipos_cartera tc ON c.id_tipo_cartera=tc.id ORDER BY c.id ASC;
		
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getEqTrabajoCartera` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getEqTrabajoCartera`()
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
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getJustificaciones` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getJustificaciones`()
BEGIN
  Select
	j.id,    
	j.justificacion,
    j.estado
    -- select *
	FROM justificaciones j
	WHERE j.estado = 'activo';
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getJustificacionesAnadidasXCarteraXGestion` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getJustificacionesAnadidasXCarteraXGestion`(IN _id_categoria_gestion int(10), _id_cartera int(10), _id_pr_resultado INT(10))
BEGIN
SELECT prj.id_justificacion, prj.id as id_pr_justificacion, j.justificacion 
FROM justificaciones j 
    INNER JOIN pr_justificaciones prj ON j.id=prj.id_justificacion
    INNER JOIN pr_resultados pr ON pr.id=prj.id_pr_resultado
    INNER JOIN paleta_resultados pal ON pr.id_paleta_resultado=pal.id
WHERE
    prj.estado = 'activo' AND
    pr.id_cartera = _id_cartera AND
    prj.id_pr_resultado = _id_pr_resultado AND
    pal.id_categoria_gestion = _id_categoria_gestion
ORDER BY j.justificacion ASC;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getMenu` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMenu`(IN _perfil int(1))
BEGIN
SELECT 
	mci.id, 
    mc.nombre as contenedor,
    mc.id as id_menu_contenedor,
    mc.imagen as contenedor_imagen,
    mi.nombre as item,
    mi.id as id_menu_item,
    mi.url,
    mi.imagen
FROM ventas.menu_contenedor_items mci
	INNER JOIN ventas.menus_contenedor mc ON mci.id_menu_contenedor=mc.id
    INNER JOIN ventas.menu_items mi ON mci.id_menu_item=mi.id
    INNER JOIN ventas.perfil_menu_contenedores pmc ON mc.id_perfil_menu_contenedor=pmc.id
WHERE pmc.id_perfil=_perfil
ORDER BY contenedor ASC;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getMenuContenedor` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMenuContenedor`()
BEGIN
    SELECT mc.id, 
		   mc.nombre as menu,
           mc.imagen,
           mc.nivel,
           mc.orden,
           mc.id_menu_contenedor,
           pmc.nombre as nombre,
           pmc.id as id_perfil_menu_contenedor
  FROM menus_contenedor mc 
	INNER JOIN perfil_menu_contenedores pmc ON mc.id_perfil_menu_contenedor = pmc.id
  ORDER BY mc.id ASC;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getMenuContenedorBase` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMenuContenedorBase`()
BEGIN
  SELECT pmc.*,p.perfil
  FROM perfil_menu_contenedores pmc
	INNER JOIN perfiles p ON pmc.id_perfil=p.id
  ORDER BY pmc.id ASC;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getMenuContenedorItem` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMenuContenedorItem`()
BEGIN
SELECT 
	mci.id, 
    mc.nombre as contenedor, 
    mc.id as id_menu_contenedor,
    mi.nombre as item,
    mi.id as id_menu_item,
    pmc.nombre as nombre,
    pmc.id as id_perfil_menu_contenedor,
    mci.estado
FROM ventas.menu_contenedor_items mci
	INNER JOIN ventas.menus_contenedor mc ON mci.id_menu_contenedor=mc.id
	INNER JOIN ventas.menu_items mi ON mci.id_menu_item=mi.id
    INNER JOIN ventas.perfil_menu_contenedores pmc ON pmc.id = mc.id_perfil_menu_contenedor
ORDER BY ID ASC;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getMenuContenedorXNivel` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMenuContenedorXNivel`(IN _nivel int(1))
BEGIN
    SELECT mc.id, 
		   mc.nombre as menu,
           mc.imagen,
           mc.nivel,
           mc.orden,
           mc.id_menu_contenedor,
           pmc.nombre as nombre,
           pmc.id as id_perfil_menu_contenedor
  FROM menus_contenedor mc 
	INNER JOIN perfil_menu_contenedores pmc ON mc.id_perfil_menu_contenedor = pmc.id
  WHERE mc.nivel = _nivel
  ORDER BY mc.id ASC;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getPaletaResultados` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getPaletaResultados`()
BEGIN
  SELECT pr.*, 
	  p.razon_social,
	  c.cartera
  FROM paleta_resultados pr
  INNER JOIN proveedores p ON pr.id_proveedor=p.id
  INNER JOIN carteras c ON pr.id_cartera=c.id
  ORDER BY pr.id ASC;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getProductoCartera` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getProductoCartera`()
BEGIN
  SELECT pc.*, p.producto, pr.razon_social, ca.cartera
	FROM producto_cartera pc 
	INNER JOIN productos p ON pc.id_producto=p.id
    INNER JOIN proveedores pr ON pc.id_proveedor=pr.id
    INNER JOIN carteras ca ON pc.id_cartera=ca.id
	ORDER BY pc.id ASC;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getProductoProveedor` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getProductoProveedor`()
BEGIN
  SELECT pp.*, p.producto, pr.razon_social
	FROM producto_proveedores pp
	INNER JOIN productos p ON pp.id_producto=p.id
    INNER JOIN proveedores pr ON pp.id_proveedor=pr.id
 ORDER BY pp.id ASC;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getProductos` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getProductos`()
BEGIN
  SELECT 
	p.*, tp.tipo_producto
  FROM 
	productos p 
    INNER JOIN tipo_productos tp ON p.id_tipo_producto=tp.id ORDER BY p.id ASC;
		
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getProveedores` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getProveedores`()
BEGIN
  SELECT 
	p.*, r.nombre as rubro
  FROM 
	proveedores p INNER JOIN rubros r ON p.id_rubro=r.id ORDER BY p.id ASC;
		
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getPrResultados` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getPrResultados`(IN _id_paleta_resultado int(10))
BEGIN
  SELECT prr.id, re.resultado FROM pr_resultados prr
	INNER JOIN resultados re ON re.id=prr.id_resultado
  WHERE prr.id_paleta_resultado=_id_paleta_resultado;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getResultados` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getResultados`()
BEGIN
  SELECT 
	r.id,
	r.resultado,
	tr.tipo_resultado
	FROM resultados r 
		INNER JOIN tipo_resultados tr ON r.id_tipo_resultado=tr.id
	WHERE r.estado="activo";
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getResultadosAnadidosXCarteraXGestion` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getResultadosAnadidosXCarteraXGestion`(IN _id_categoria_gestion int(10), _id_cartera int(10))
BEGIN
    SELECT 
    r.id, pr.id as id_resultado, r.resultado
FROM
    paleta_resultados p
        INNER JOIN
    pr_resultados pr ON p.id = pr.id_paleta_resultado
        INNER JOIN
    resultados r ON pr.id_resultado = r.id
WHERE
	p.estado='activo' AND
    p.id_cartera = _id_cartera AND
	p.id_categoria_gestion = _id_categoria_gestion AND
    pr.estado='activo'    
ORDER BY r.resultado ASC;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getSegmentos` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getSegmentos`()
BEGIN
  SELECT s.*, c.cartera FROM segmentos s INNER JOIN carteras c ON s.id_cartera=c.id ORDER BY s.id ASC;
		
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getTipoContactoAnadidasXCarteraXGestion` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getTipoContactoAnadidasXCarteraXGestion`(IN _id_categoria_gestion int(10), _id_cartera int(10), _id_pr_resultado INT(10))
BEGIN
SELECT prj.id_tipo_contacto, prj.id as id_pr_tipo_contacto, j.tipo_contacto 
FROM tipos_contacto j 
	INNER JOIN pr_tipo_contacto prj ON j.id=prj.id_tipo_contacto
    INNER JOIN pr_resultados pr ON pr.id=prj.id_pr_resultado
    INNER JOIN paleta_resultados pal ON pr.id_paleta_resultado=pal.id
WHERE
	pr.estado='activo' AND
    pr.id_cartera = _id_cartera AND
    prj.id_pr_resultado = _id_pr_resultado AND
	pal.id_categoria_gestion = _id_categoria_gestion
ORDER BY j.tipo_contacto ASC;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getTipoContactoResultado` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getTipoContactoResultado`()
BEGIN
  SELECT tcr.*, r.resultado, tc.tipo_contacto
	FROM tipo_contacto_resultados tcr
	INNER JOIN resultados r ON tcr.id_resultado=r.id
    INNER JOIN tipos_contacto tc ON tcr.id_tipo_contacto=tc.id
  ORDER BY tcr.id ASC;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getUsuario` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getUsuario`( IN _id_usuario char(10))
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
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_getUsuarios` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getUsuarios`()
BEGIN
  SELECT 
	us.id, us.dni, us.ap_paterno, us.ap_materno, us.nombres, us.fecnac, us.est_civil, us.fec_ingreso, 
    us.movil, us.fijo, us.direccion, us.idubigeo, us.email_corp, us.email_per, us.user, 
    us.contacto_emergencia, us.telef_contacto, per.perfil, per.id as id_perfil, us.turno,
	CONCAT(ub.dpto, "/", ub.prov, "/", ub.dist) as distrito, ub.idubigeo as ubigeo 
  FROM ubigeo ub
  INNER JOIN users us ON  ub.idubigeo=us.idubigeo
  INNER JOIN perfiles per ON us.id_perfil=per.id ORDER BY us.id ASC;
END$$
DELIMITER ;

