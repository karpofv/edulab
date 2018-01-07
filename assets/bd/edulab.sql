-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.25-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla edulab.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `cat_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cat_descripcion` varchar(250) NOT NULL,
  `cat_resumen` text NOT NULL,
  `cat_imagen` varchar(250) NOT NULL DEFAULT 'standar.png',
  `cat_stcodigo` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`cat_codigo`),
  UNIQUE KEY `cat_descripcion` (`cat_descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.categoria: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT IGNORE INTO `categoria` (`cat_codigo`, `cat_descripcion`, `cat_resumen`, `cat_imagen`, `cat_stcodigo`) VALUES
	(1, 'android', 'Saber cómo crear aplicaciones de Android es una habilidad deseable. En 2016, 110 millones de personas reportadas usaron Android como su sistema operativo. A su vez, el mercado laboral para las personas que saben cómo crear aplicaciones de Android está en auge, con un aumento del 110 por ciento en los trabajos de Android desde 2012 hasta 2014. Ya sea que esté buscando convertirse en un desarrollador de Android o asumir una profesión en tecnología de la información (TI), al final del curso puede aprovechar al máximo todas las ventajas de Android.', 'standar.png', 1),
	(2, 'Desarrollo web', 'Estos cursos están diseñados para ayudarlo a desarrollar habilidades mediante la creación de sitios web, la creación de esquemas de bases de datos y la configuración de tecnologías del lado del servidor. Ya sea que esté construyendo su primer sitio web o avanzando sus habilidades para aprovechar optimizaciones avanzadas de rendimiento del navegador web o crear aplicaciones escalables aprovechando los servicios en la nube, le enseñaremos lo que necesita saber para convertirse en un desarrollador web de front-end, ingeniero back-end , o un ingeniero Full-Stack.', 'standar.png', 1),
	(3, 'Marketing digital', 'Solo en los Estados Unidos, más de 70 mil millones de dólares se gastan en marketing digital cada año. El programa de marketing digital de Udacity le ayuda a cubrir toda la gama de especialidades de marketing digital, y crea una base amplia que lo convertirá en una valiosa adición a cualquier empresa que busque experiencia en marketing digital. Podrá ejecutar campañas en vivo en las principales plataformas de marketing. Aprenderá y aplicará nuevas técnicas, analizará resultados, producirá conocimientos prácticos y creará una cartera de trabajo dinámica. También se beneficiará de una mentoría de apoyo y una rigurosa revisión de proyectos, y nuestros socios expertos, que juntos comprenden la vanguardia absoluta de la experiencia en marketing digital, le enseñarán en el aula y colaborarán con usted durante los eventos en línea.', 'standar.png', 1);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.contenido
CREATE TABLE IF NOT EXISTS `contenido` (
  `cont_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cont_obcodigo` int(11) NOT NULL DEFAULT '0',
  `cont_url` text,
  `cont_titulo` varchar(250) NOT NULL DEFAULT '0',
  `cont_descripcion` blob NOT NULL,
  `cont_compilador` int(11) NOT NULL,
  `cont_orden` int(11) NOT NULL DEFAULT '0',
  `cont_stcodigo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cont_codigo`),
  KEY `FK_contenido_objetivos` (`cont_obcodigo`),
  KEY `FK_contenido_tools_status` (`cont_stcodigo`),
  KEY `FK_contenido_tools_status_2` (`cont_compilador`),
  CONSTRAINT `FK_contenido_objetivos` FOREIGN KEY (`cont_obcodigo`) REFERENCES `objetivos` (`ob_codigo`),
  CONSTRAINT `FK_contenido_tools_status` FOREIGN KEY (`cont_stcodigo`) REFERENCES `tools_status` (`st_codigo`),
  CONSTRAINT `FK_contenido_tools_status_2` FOREIGN KEY (`cont_compilador`) REFERENCES `tools_status` (`st_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.contenido: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `contenido` DISABLE KEYS */;
INSERT IGNORE INTO `contenido` (`cont_codigo`, `cont_obcodigo`, `cont_url`, `cont_titulo`, `cont_descripcion`, `cont_compilador`, `cont_orden`, `cont_stcodigo`) VALUES
	(10, 9, 'VpHArAxBAdk', 'Intoducción', _binary 0x3C703E436F6E67726174756C6174696F6E73206F6E2074616B696E6720746865206669727374207374657020746F206C6561726E696E6720416E64726F6964212042792074686520656E64206F66207468697320636F757273652C20796F75252333373B2333393B6C6C206B6E6F7720686F7720746F206D616B6520612073696E676C652D73637265656E20416E64726F6964206170702077697468207465787420616E6420696D616765732E205765252333373B2333393B6C6C206469736375737320686F7720746F206372656174652061207573657220696E74657266616365207468726F756768206120736572696573206F662073686F727420766964656F732077697468206C6F7473206F662068616E64732D6F6E2070726163746963652E3C2F703E0A, 2, 1, 1),
	(11, 9, '', 'Preparing for the Journey Ahead', _binary 0x3C68323E436F6D6D6F6E206F62737461636C65733C2F68323E0A0A3C703E5768656E20737065616B696E672077697468206D616E792073747564656E74732C20776520666F756E6420636F6D6D6F6E20726561736F6E732077687920746865792077657265206865736974616E7420746F207374617274206C6561726E696E6720416E64726F69643A3C2F703E0A0A3C756C3E0A093C6C693E4C61636B206F6620636F6E666964656E6365207468617420746865792063616E206265206120646576656C6F7065723C2F6C693E0A093C6C693E436F6465207365656D7320696E74696D69646174696E673C2F6C693E0A093C6C693E546F6F6C73207365656D20636F6D706C65783C2F6C693E0A093C6C693E546F6F206D756368206A6172676F6E3C2F6C693E0A093C6C693E436F6E63657074732061726520746F6F2061627374726163743C2F6C693E0A3C2F756C3E0A0A3C703E57652074616B65207468657365206F62737461636C657320736572696F75736C7920616E642063616D652075702077697468207761797320746F2074727920746F2068656C7020796F75206F766572636F6D65207468656D2E204F75722061696D20697320746F206D616B6520746865206C6561726E696E6720637572766520617320636F6D666F727461626C6520617320706F737369626C6520666F7220796F7520617320612073747564656E742C20736F20796F757220636F6E666964656E63652067726F777320776974682065616368206E657720636F6E63657074206D617374657265642E3C2F703E0A0A3C68323E56697375616C733C2F68323E0A0A3C703E466F7220616C6C207468652076697375616C206C6561726E657273206F75742074686572652C20776520757365206C6F7473206F662064726177696E67732C20616E616C6F676965732C20616E642070726F707320746F206578706C61696E20746563686E6963616C20636F6E63657074732074686174206F746865727769736520636F756C6420626520636F6E667573696E672E3C2F703E0A, 1, 2, 1);
/*!40000 ALTER TABLE `contenido` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.curso
CREATE TABLE IF NOT EXISTS `curso` (
  `cur_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cur_catcodigo` int(11) NOT NULL,
  `cur_gracodigo` int(11) NOT NULL COMMENT 'grado de complejidad',
  `cur_descripcion` varchar(250) NOT NULL,
  `cur_percodigo` int(11) NOT NULL COMMENT 'tutor del curso',
  `cur_resumen` text NOT NULL,
  `cur_imagen` text NOT NULL,
  `cur_estcodigo` int(11) NOT NULL DEFAULT '3' COMMENT 'estado del curso',
  PRIMARY KEY (`cur_codigo`),
  UNIQUE KEY `cur_descripcion` (`cur_percodigo`,`cur_gracodigo`,`cur_descripcion`,`cur_catcodigo`),
  KEY `FK_curso_tools_grados` (`cur_gracodigo`),
  KEY `FK_curso_tools_status` (`cur_estcodigo`),
  KEY `FK_curso_categoria` (`cur_catcodigo`),
  CONSTRAINT `FK_curso_categoria` FOREIGN KEY (`cur_catcodigo`) REFERENCES `categoria` (`cat_codigo`),
  CONSTRAINT `FK_curso_persona` FOREIGN KEY (`cur_percodigo`) REFERENCES `persona` (`per_codigo`),
  CONSTRAINT `FK_curso_tools_grados` FOREIGN KEY (`cur_gracodigo`) REFERENCES `tools_grados` (`gra_codigo`),
  CONSTRAINT `FK_curso_tools_status` FOREIGN KEY (`cur_estcodigo`) REFERENCES `tools_status` (`st_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.curso: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT IGNORE INTO `curso` (`cur_codigo`, `cur_catcodigo`, `cur_gracodigo`, `cur_descripcion`, `cur_percodigo`, `cur_resumen`, `cur_imagen`, `cur_estcodigo`) VALUES
	(1, 1, 3, 'Android avanzado', 1, 'No programming experience? No Problem! Start developing Android apps today.', '', 3),
	(19, 1, 3, 'sdasdsss', 1, 'No programming experience?', 'standar.png', 3);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.curso_clase
CREATE TABLE IF NOT EXISTS `curso_clase` (
  `curc_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `curc_curcodigo` int(11) NOT NULL DEFAULT '0',
  `curc_descripcion` varchar(250) NOT NULL DEFAULT '0',
  `curc_orden` int(11) NOT NULL DEFAULT '0',
  `curc_stcodigo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`curc_codigo`),
  UNIQUE KEY `curc_curcodigo` (`curc_descripcion`,`curc_orden`,`curc_curcodigo`),
  KEY `FK__tools_status` (`curc_stcodigo`),
  KEY `FK_curso_clase_curso` (`curc_curcodigo`),
  CONSTRAINT `FK__tools_status` FOREIGN KEY (`curc_stcodigo`) REFERENCES `tools_status` (`st_codigo`),
  CONSTRAINT `FK_curso_clase_curso` FOREIGN KEY (`curc_curcodigo`) REFERENCES `curso` (`cur_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.curso_clase: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `curso_clase` DISABLE KEYS */;
INSERT IGNORE INTO `curso_clase` (`curc_codigo`, `curc_curcodigo`, `curc_descripcion`, `curc_orden`, `curc_stcodigo`) VALUES
	(5, 1, ' Clase 2: control de flujo y condicionales1.', 1, 1);
/*!40000 ALTER TABLE `curso_clase` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `menu_descripcion` varchar(50) DEFAULT NULL,
  `menu_icono` varchar(50) DEFAULT NULL,
  `menu_status` int(11) DEFAULT '0',
  PRIMARY KEY (`menu_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.menu: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT IGNORE INTO `menu` (`menu_codigo`, `menu_descripcion`, `menu_icono`, `menu_status`) VALUES
	(1, 'Sistema', 'verified_user', 1),
	(2, 'Configuraciones', 'fa fa-cog', 1),
	(3, 'Publicar', 'file_upload', 1),
	(4, 'Mis cursos', 'developer_board', 1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.menu_submenu
CREATE TABLE IF NOT EXISTS `menu_submenu` (
  `subm_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `subm_menucodigo` int(11) NOT NULL,
  `subm_nivel` int(11) NOT NULL,
  `subm_descripcion` varchar(50) NOT NULL,
  `subm_icono` varchar(50) DEFAULT NULL,
  `subm_url1` varchar(50) DEFAULT NULL,
  `subm_url2` varchar(50) DEFAULT NULL,
  `subm_url3` varchar(50) DEFAULT NULL,
  `subm_url4` varchar(50) DEFAULT NULL,
  `subm_url5` varchar(50) DEFAULT NULL,
  `subm_url6` varchar(50) DEFAULT NULL,
  `subm_url7` varchar(50) DEFAULT NULL,
  `subm_url8` varchar(50) DEFAULT NULL,
  `subm_url9` varchar(50) DEFAULT NULL,
  `subm_url10` varchar(50) DEFAULT NULL,
  `subm_url11` varchar(50) DEFAULT NULL,
  `subm_url12` varchar(50) DEFAULT NULL,
  `subm_url13` varchar(50) DEFAULT NULL,
  `subm_url14` varchar(50) DEFAULT NULL,
  `subm_url15` varchar(50) DEFAULT NULL,
  `subm_url16` varchar(50) DEFAULT NULL,
  `subm_url17` varchar(50) DEFAULT NULL,
  `subm_url18` varchar(50) DEFAULT NULL,
  `subm_url19` varchar(50) DEFAULT NULL,
  `subm_url20` varchar(50) DEFAULT NULL,
  `subm_modelo` varchar(50) DEFAULT NULL,
  `subm_jquery` varchar(50) DEFAULT NULL,
  `subm_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`subm_codigo`),
  KEY `FK_menu_submenu_menu` (`subm_menucodigo`),
  CONSTRAINT `FK_menu_submenu_menu` FOREIGN KEY (`subm_menucodigo`) REFERENCES `menu` (`menu_codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.menu_submenu: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `menu_submenu` DISABLE KEYS */;
INSERT IGNORE INTO `menu_submenu` (`subm_codigo`, `subm_menucodigo`, `subm_nivel`, `subm_descripcion`, `subm_icono`, `subm_url1`, `subm_url2`, `subm_url3`, `subm_url4`, `subm_url5`, `subm_url6`, `subm_url7`, `subm_url8`, `subm_url9`, `subm_url10`, `subm_url11`, `subm_url12`, `subm_url13`, `subm_url14`, `subm_url15`, `subm_url16`, `subm_url17`, `subm_url18`, `subm_url19`, `subm_url20`, `subm_modelo`, `subm_jquery`, `subm_status`) VALUES
	(1, 1, 1, 'Crear usuarios', 'keyboard_arrow_right', 'sistema/adminsistema/usuarios/usuarios.php', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sistema/adminsistema/usuarios/modelo.php', 'sistema/adminsistema/usuarios/script.js', 1),
	(2, 1, 1, 'Crear perfiles', 'keyboard_arrow_right', 'sistema/adminsistema/perfiles/perfiles.php', 'sistema/adminsistema/perfiles/menu_list.php', 'sistema/adminsistema/perfiles/menu_accion.php', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sistema/adminsistema/perfiles/modelo.php', 'sistema/adminsistema/perfiles/modelo.php', 'sistema/adminsistema/perfiles/script.js', 1),
	(3, 3, 1, 'Categorias', 'keyboard_arrow_right', 'sistema/categoria/categoria.php', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sistema/categoria/modelo.php', 'sistema/categoria/modelo.php', 'sistema/categoria/script.js', 1),
	(4, 4, 1, 'Crear curso', 'keyboard_arrow_right', 'sistema/curso/curso.php', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sistema/curso/modelo.php', 'sistema/curso/modelo.php', 'sistema/curso/script.js', 1),
	(6, 3, 1, 'Cursos', 'keyboard_arrow_right', 'sistema/publicar/curso/curso.php', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sistema/publicar/curso/modelo.php', 'sistema/publicar/curso/modelo.php', 'sistema/publicar/curso/script.js', 1),
	(7, 4, 0, 'Clase', 'keyboard_arrow_right', 'sistema/clase/clase.php', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sistema/clase/modelo.php', 'sistema/clase/modelo.php', 'sistema/clase/script.js', 1),
	(8, 4, 0, 'Objetivo', 'keyboard_arrow_right', 'sistema/objetivo/objetivo.php', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sistema/objetivo/modelo.php', 'sistema/objetivo/modelo.php', 'sistema/objetivo/script.js', 1),
	(9, 4, 0, 'Contenido', 'keyboard_arrow_right', 'sistema/contenido/contenido.php', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sistema/contenido/modelo.php', 'sistema/contenido/modelo.php', 'sistema/contenido/script.js', 1),
	(11, 4, 0, 'Vista previa', 'keyboard_arrow_right', 'sistema/curso/preview/preview.php', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sistema/curso/preview/modelo.php', 'sistema/curso/preview/modelo.php', 'sistema/curso/preview/script.js', 1),
	(12, 4, 0, 'Vista Contenido', 'keyboard_arrow_right', 'sistema/cursar/curso.php', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sistema/cursar/modelo.php', 'sistema/cursar/modelo.php', 'sistema/cursar/script.js', 1),
	(13, 1, 1, 'Editor', 'keyboard_arrow_right', 'sistema/editor/editor.php', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sistema/editor/modelo.php', 'sistema/editor/modelo.php', 'sistema/editor/script.js', 1);
/*!40000 ALTER TABLE `menu_submenu` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.objetivos
CREATE TABLE IF NOT EXISTS `objetivos` (
  `ob_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ob_orden` int(11) NOT NULL DEFAULT '0',
  `ob_curccodigo` int(11) NOT NULL,
  `ob_descripcion` varchar(250) NOT NULL,
  `ob_resumen` text NOT NULL,
  `ob_stcodigo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ob_codigo`),
  UNIQUE KEY `ob_curccodigo` (`ob_orden`,`ob_curccodigo`),
  KEY `FK__curso_clase` (`ob_curccodigo`),
  KEY `FK__tools_status_objetivos` (`ob_stcodigo`),
  CONSTRAINT `FK__curso_clase` FOREIGN KEY (`ob_curccodigo`) REFERENCES `curso_clase` (`curc_codigo`),
  CONSTRAINT `FK__tools_status_objetivos` FOREIGN KEY (`ob_stcodigo`) REFERENCES `tools_status` (`st_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.objetivos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `objetivos` DISABLE KEYS */;
INSERT IGNORE INTO `objetivos` (`ob_codigo`, `ob_orden`, `ob_curccodigo`, `ob_descripcion`, `ob_resumen`, `ob_stcodigo`) VALUES
	(9, 1, 5, 'Variables y tipos de datos', 'Descubre la idea básica detrás de la programación y escribe tu primer programa Java. usar variable para almacenar y recuperar información.', 1);
/*!40000 ALTER TABLE `objetivos` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.perfiles
CREATE TABLE IF NOT EXISTS `perfiles` (
  `perf_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `perf_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`perf_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.perfiles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT IGNORE INTO `perfiles` (`perf_codigo`, `perf_descripcion`) VALUES
	(1, 'GOD'),
	(2, 'Administrador');
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.perfiles_det
CREATE TABLE IF NOT EXISTS `perfiles_det` (
  `perdet_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `perdet_perfcodigo` int(11) NOT NULL,
  `perdet_menucodigo` int(11) NOT NULL,
  `perdet_submcodigo` int(11) NOT NULL,
  `perdet_S` int(11) NOT NULL DEFAULT '1',
  `perdet_U` int(11) NOT NULL DEFAULT '1',
  `perdet_D` int(11) NOT NULL DEFAULT '1',
  `perdet_I` int(11) NOT NULL DEFAULT '1',
  `perdet_P` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`perdet_codigo`),
  KEY `FK_perfiles_det_menu` (`perdet_menucodigo`),
  KEY `FK_perfiles_det_menu_submenu` (`perdet_submcodigo`),
  KEY `FK_perfiles_det_perfiles` (`perdet_perfcodigo`),
  CONSTRAINT `FK_perfiles_det_menu` FOREIGN KEY (`perdet_menucodigo`) REFERENCES `menu` (`menu_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_perfiles_det_menu_submenu` FOREIGN KEY (`perdet_submcodigo`) REFERENCES `menu_submenu` (`subm_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_perfiles_det_perfiles` FOREIGN KEY (`perdet_perfcodigo`) REFERENCES `perfiles` (`perf_codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.perfiles_det: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `perfiles_det` DISABLE KEYS */;
INSERT IGNORE INTO `perfiles_det` (`perdet_codigo`, `perdet_perfcodigo`, `perdet_menucodigo`, `perdet_submcodigo`, `perdet_S`, `perdet_U`, `perdet_D`, `perdet_I`, `perdet_P`) VALUES
	(1, 1, 1, 1, 1, 1, 1, 1, 1),
	(8, 1, 1, 2, 1, 1, 1, 1, 1),
	(9, 2, 1, 1, 1, 1, 1, 1, 1),
	(10, 2, 3, 3, 1, 1, 1, 1, 1),
	(11, 1, 3, 3, 1, 1, 1, 1, 1),
	(12, 1, 4, 4, 1, 1, 1, 1, 1),
	(13, 1, 3, 6, 1, 1, 1, 1, 1),
	(14, 2, 3, 6, 1, 1, 1, 1, 1),
	(15, 1, 1, 13, 1, 1, 1, 1, 1),
	(16, 2, 1, 13, 1, 1, 1, 1, 1);
/*!40000 ALTER TABLE `perfiles_det` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `per_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `per_cedula` int(11) DEFAULT NULL,
  `per_nombres` varchar(50) DEFAULT NULL,
  `per_apellidos` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`per_codigo`),
  UNIQUE KEY `per_cedula` (`per_cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.persona: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT IGNORE INTO `persona` (`per_codigo`, `per_cedula`, `per_nombres`, `per_apellidos`) VALUES
	(1, 123123, 'admin', 'admin'),
	(3, 19191493, 'GABRIEL ANATOLY', 'ROJAS');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.redirecciones
CREATE TABLE IF NOT EXISTS `redirecciones` (
  `redir_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `redir_descripcion` varchar(50) DEFAULT NULL,
  `redir_url1` varchar(50) DEFAULT NULL,
  `redir_modelo` varchar(50) DEFAULT NULL,
  `redir_jquery` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`redir_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.redirecciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `redirecciones` DISABLE KEYS */;
INSERT IGNORE INTO `redirecciones` (`redir_codigo`, `redir_descripcion`, `redir_url1`, `redir_modelo`, `redir_jquery`) VALUES
	(1, 'Página principal', 'sistema/index.php', NULL, NULL);
/*!40000 ALTER TABLE `redirecciones` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.tools_grados
CREATE TABLE IF NOT EXISTS `tools_grados` (
  `gra_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `gra_descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`gra_codigo`),
  UNIQUE KEY `gra_descripcion` (`gra_descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.tools_grados: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tools_grados` DISABLE KEYS */;
INSERT IGNORE INTO `tools_grados` (`gra_codigo`, `gra_descripcion`) VALUES
	(3, 'avanzado'),
	(2, 'intermedio'),
	(1, 'principiante');
/*!40000 ALTER TABLE `tools_grados` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.tools_status
CREATE TABLE IF NOT EXISTS `tools_status` (
  `st_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `st_descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`st_codigo`),
  UNIQUE KEY `st_descripcion` (`st_descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla edulab.tools_status: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tools_status` DISABLE KEYS */;
INSERT IGNORE INTO `tools_status` (`st_codigo`, `st_descripcion`) VALUES
	(1, 'ACTIVO'),
	(2, 'INACTIVO'),
	(3, 'REVISION');
/*!40000 ALTER TABLE `tools_status` ENABLE KEYS */;


-- Volcando estructura para tabla edulab.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula` int(11) NOT NULL DEFAULT '0',
  `Usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contrasena` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Nivel` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Stilo` int(1) NOT NULL,
  `theme_color` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Codigo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Registro` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fecha` datetime NOT NULL,
  `Img_perfil` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Observacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Usuario` (`Usuario`),
  UNIQUE KEY `Cedula_2` (`Tipo`,`Cedula`),
  KEY `Tipo` (`Cedula`,`Tipo`,`Usuario`),
  KEY `Cedula` (`Codigo`,`Usuario`,`Cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1;

-- Volcando datos para la tabla edulab.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT IGNORE INTO `usuarios` (`id`, `Cedula`, `Usuario`, `contrasena`, `Tipo`, `Nivel`, `Stilo`, `theme_color`, `Codigo`, `Registro`, `Fecha`, `Img_perfil`, `Observacion`) VALUES
	(1, 12345, 'GOD', 'a1b995eb2627f17bfd5fcb1de8533c62', 'GOD', '1', 0, '', NULL, NULL, '0000-00-00 00:00:00', '19191493.jpg', NULL),
	(5, 123123, 'admin', 'a1b995eb2627f17bfd5fcb1de8533c62', 'Empleado', '2', 0, '', NULL, NULL, '0000-00-00 00:00:00', 'unelllez.png', NULL),
	(7, 19191493, 'rojasgb', 'a1b995eb2627f17bfd5fcb1de8533c62', 'Empleado', '2', 0, '', NULL, NULL, '0000-00-00 00:00:00', '', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
