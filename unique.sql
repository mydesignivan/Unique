-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-09-2010 a las 23:19:30
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `unique`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodas`
--

CREATE TABLE IF NOT EXISTS `bodas` (
  `bodas_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_evento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `google_maps_salon` varchar(100) NOT NULL,
  `google_maps_iglesia` varchar(100) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nombre_novio` varchar(255) NOT NULL,
  `apellido_novio` varchar(255) NOT NULL,
  `nombre_novia` varchar(255) NOT NULL,
  `apellido_novia` varchar(255) NOT NULL,
  `historia_novia` varchar(255) NOT NULL,
  `imagen_novia` varchar(255) NOT NULL,
  `imagen_novia_width` int(11) NOT NULL,
  `imagen_novia_height` int(11) NOT NULL,
  `historia_novio` varchar(255) NOT NULL,
  `imagen_novio` varchar(255) NOT NULL,
  `imagen_novio_width` int(11) NOT NULL,
  `imagen_novio_height` int(11) NOT NULL,
  `historia_novios` varchar(255) NOT NULL,
  `imagen_novios` varchar(255) NOT NULL,
  `imagen_novios_width` int(11) NOT NULL,
  `imagen_novios_height` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`bodas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `bodas`
--

INSERT INTO `bodas` (`bodas_id`, `fecha_evento`, `google_maps_salon`, `google_maps_iglesia`, `users_id`, `nombre_novio`, `apellido_novio`, `nombre_novia`, `apellido_novia`, `historia_novia`, `imagen_novia`, `imagen_novia_width`, `imagen_novia_height`, `historia_novio`, `imagen_novio`, `imagen_novio_width`, `imagen_novio_height`, `historia_novios`, `imagen_novios`, `imagen_novios_width`, `imagen_novios_height`, `date_added`, `last_modified`) VALUES
(5, '2010-09-16 12:42:33', 'ubisalon', 'ubiiglesia', 4, 'nomnovio', 'apenovio', 'nombrenovia', 'apenovia', 'historia novioa', '4_12846516904c923aaab723a__bay-area-weddings.jpg', 108, 81, 'historias novios', '4_12846516984c923ab22c14e__weddings(main).jpg', 108, 82, 'historias novios', '4_12846517294c923ad12644d__imagen.jpg', 108, 81, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodas_menu`
--

CREATE TABLE IF NOT EXISTS `bodas_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `bodas_id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `bodas_menu`
--

INSERT INTO `bodas_menu` (`menu_id`, `bodas_id`, `menu`) VALUES
(3, 5, 'menu1'),
(4, 5, 'menu2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodas_regalos`
--

CREATE TABLE IF NOT EXISTS `bodas_regalos` (
  `regalo_id` int(11) NOT NULL AUTO_INCREMENT,
  `bodas_id` int(11) NOT NULL,
  `regalo` varchar(255) NOT NULL,
  PRIMARY KEY (`regalo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `bodas_regalos`
--

INSERT INTO `bodas_regalos` (`regalo_id`, `bodas_id`, `regalo`) VALUES
(3, 5, 'regalo1'),
(4, 5, 'regalo2'),
(5, 5, 'regalo3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` varchar(500) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('c4cc6521fa61029b9a12a0e19c3ab64e', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.2.9', 1284671177, 'a:7:{s:8:"users_id";s:1:"6";s:8:"username";s:8:"invitado";s:5:"email";s:0:"";s:5:"level";s:1:"0";s:10:"date_added";s:19:"2010-09-15 18:36:41";s:13:"last_modified";s:19:"2010-09-15 18:36:41";s:9:"logged_in";s:1:"1";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `contents`
--

INSERT INTO `contents` (`content_id`, `reference`, `title`, `content`, `date_added`, `last_modified`) VALUES
(1, 'quienes-somos', '¿Quienes Somos?', '<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><em><strong>Unique WP </strong></em></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"> es una empresa joven, responsable&nbsp;y profesional&nbsp;dedicada a la creaci&oacute;n y organizaci&oacute;n integral de bodas, cuidando al m&aacute;ximo cada detalle.</span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><img style="float: right;" src="/trabajos/unique.git/uploads/kcfinder/image/quienes-somos-foto.png" alt="" width="269" height="400" /></span></span></p>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Nuestro objetivo&nbsp;se centra&nbsp;en ofrecer todo lo que los novios necesiten para obtener una fiesta inolvidable, complaciendo sus gustos y&nbsp;sus personalidades,&nbsp;pero principalmente&nbsp;sus sue&ntilde;os. Es decir, creamos una ceremonia que los identifique y represente. <br />&nbsp;<br />En la actualidad, las parejas dedican la mayor parte de su tiempo a la vida laboral, lo que al momento de decidir casarse, se ven obligados a destinar cada peque&ntilde;a porci&oacute;n&nbsp; de su&nbsp;tiempo libre a concertar entrevistas, planificar detalles, citarse con proveedores, prever situaciones, tener un plan B y un sinf&iacute;n de tareas, que </span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><em><strong>Unique WP </strong></em></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"> resuelve bajo la atenta supervisi&oacute;n de los novios, liber&aacute;ndoles del stress</span></span><em><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"> </span></span></em><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">que supone coordinar todo lo relacionado con este gran acontecimiento. </span></span></p>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><em><strong>Unique WP </strong></em></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"> brinda un servicio que se basa en la coordinaci&oacute;n y creatividad para  que ese d&iacute;a sea una celebraci&oacute;n inolvidable. Para ello ofrecemos consejos y controles constantes a fin de que cada proveedor contratado cumpla en tiempo y forma con lo pactado, sin dejar de lado que sea arm&oacute;nico al estilo de evento deseado.</span></span></p>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Adem&aacute;s poseemos conocimientos del sector y estudiamos las &uacute;ltimas tendencias, ampliando as&iacute; la innovaci&oacute;n y permitiendo que este sea &uacute;nico. Damos gran importancia al acompa&ntilde;amiento de los novios a todas las entrevistas, lo que nos permite  obtener un feedback instant&aacute;neo de los gustos y preferencias del cliente y de esta manera personalizar nuestros servicios a la medida de cada necesidad y contando con comunicaci&oacute;n permanente (24 hs.).</span></span></p>', '2010-09-12 18:07:09', '2010-09-12 02:37:52'),
(2, 'servicios', 'Servicios', '<p><strong>NUESTROS SERVICIOS:</strong><br /><br /><strong>Servicio Integral:</strong> Destinado a parejas que desean una completa organizaci&oacute;n, confiando en nosotros cada uno de los detalles.</p>\n<p><strong>Servicio de Coordinaci&oacute;n:</strong> Pertinentes a aquellas parejas que ya han contratado algunos de los servicios y desean adquirir apoyo profesional en la elecci&oacute;n de los faltantes y la coordinaci&oacute;n del d&iacute;a de la boda.</p>\n<p><strong>Servicio &ldquo;D&iacute;a D&rdquo;:</strong> Orientados a aquellos que han organizado su boda, pero desean disfrutar y relajarse, sin la preocupaci&oacute;n de todas las eventualidades que pueden surgir en el d&iacute;a de la Boda. (para ello es necesario contar con dos semanas previas de informaci&oacute;n sobre todo lo referido a la boda). <br /><br />Unique WP brinda un servicio que se basa en la coordinaci&oacute;n y la creatividad, de modo tal, que ese d&iacute;a sea una celebraci&oacute;n inolvidable. Para ello, ofrecemos consejos y controles constantes a fin de que cada proveedor contratado cumpla en tiempo y forma con lo pactado, conforme al estilo de evento deseado.<br />Adem&aacute;s poseemos conocimientos del sector y estudiamos las &uacute;ltimas tendencias, ampliando as&iacute; la innovaci&oacute;n y permitiendo que este sea &uacute;nico. Damos gran importancia al acompa&ntilde;amiento de los novios a todas las entrevistas, lo que nos accede a obtener un feedback instant&aacute;neo de los gustos y preferencias del cliente y de esta manera personalizar nuestros servicios a la medida de cada necesidad. Ofrecemos comunicaci&oacute;n permanente.</p>\n<p>Damos asesoramiento sobre la totalidad de los servicios necesarios para garantizar el &eacute;xito de la celebraci&oacute;n, desde el inicio hasta su finalizaci&oacute;n.</p>\n<ul>\n<li>Ceremonia civil.</li>\n<li>Ceremonia religiosa.</li>\n<li>Lugar (sal&oacute;n, hotel, quinta).</li>\n<li>Armados de carpas.</li>\n<li>Catering.</li>\n<li>Barras.</li>\n<li>Ambientaci&oacute;n.</li>\n<li>Djs, sonido e iluminaci&oacute;n.</li>\n<li>Fotograf&iacute;a y video.</li>\n<li>Vestimenta de novia/o, madrinas y padrinos.</li>\n<li>Peinado y make up.</li>\n<li>Arreglo florares.</li>\n<li>Alianzas.</li>\n<li>Lista de regalos</li>\n<li>Invitaciones.</li>\n<li>Servicio de confirmaci&oacute;n de asistencia.</li>\n<li>Movilidad para novios. (en el caso de ser necesario, para invitados)</li>\n<li>Reservas de alojamientos de invitados.</li>\n<li>Tarjetas de salutaci&oacute;n <img style="float: right;" src="/trabajos/unique.git/uploads/kcfinder/image/servicios-foto.png" alt="" width="245" height="159" /></li>\n<li>Noches de boda.</li>\n<li>Luna de miel.</li>\n</ul>', '2010-09-12 18:07:09', '2010-09-13 11:41:35'),
(3, 'modalidad', 'Modalidad', '<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Etapas del servicio:</strong></span></span></p>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Para llevar a cabo eficazmente la organizaci&oacute;n y coordinaci&oacute;n del evento contamos con 5 etapas principales:</span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><img style="float: right;" src="/trabajos/unique.git/uploads/kcfinder/image/modalidad-foto.png" alt="" width="339" height="422" /></span></span></p>\n<ol>\n<li>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Planificaci&oacute;n 	y organizaci&oacute;n</strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">: 	En principio, se determina el concepto o tem&aacute;tica de la boda, se 	define el presupuesto total aproximado y se inicia una gu&iacute;a con los 	pasos y procesos para la optimizaci&oacute;n de la organizaci&oacute;n, donde se 	establece un cronograma con las acciones desde el inicio de la 	planificaci&oacute;n hasta su finalizaci&oacute;n.</span></span><span style="color: #000000;"></span></p>\n</li>\n<li>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Realizaci&oacute;n, 	direcci&oacute;n y control</strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">: 	Orientado a la ejecuci&oacute;n de lo pautado y su seguimiento y control 	para evitar futuras eventualidades. Comprende la b&uacute;squeda y 	selecci&oacute;n de los proveedores acordes al acontecimiento, programar 	las entrevistas en funci&oacute;n de las necesidades operativas, revisi&oacute;n 	permanente de situaciones cr&iacute;ticas, disponibilidad del mobiliario y 	ubicaci&oacute;n de invitados y proveedores, confirmaci&oacute;n de asistencia, 	gesti&oacute;n hotelera y de traslado, manejo de la sincronizaci&oacute;n del 	evento, acompa&ntilde;amiento, asesoramiento y supervisi&oacute;n continua.</span></span></p>\n</li>\n<li>\n<p><span style="color: #000000;">&ldquo;</span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>D&iacute;a 	D&rdquo;:</strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"> Se refiere a la log&iacute;stica y coordinaci&oacute;n del d&iacute;a de la boda, 	poniendo en pr&aacute;ctica todo lo planeado anteriormente, verificando 	acciones para obtener soluciones ante situaciones no previstas, 	dirigiendo todos los servicios para su correcta ejecuci&oacute;n en tiempo 	y forma. Para ello se cuenta con la presencia del profesional 	durante el armado y el desarrollo del evento.</span></span></p>\n</li>\n<li>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Post-evento: </strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Nos 	ocupamos de verificar y controlar el estado de los materiales 	utilizados por los proveedores. Y adem&aacute;s se enviar&aacute; tarjetas de 	salutaci&oacute;n. </span></span></p>\n</li>\n<li>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Fidelizaci&oacute;n 	al cliente:</strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"> Posterior contacto con los reci&eacute;n casados. </span></span></p>\n</li>\n</ol>', '2010-09-12 18:07:09', '2010-09-12 02:50:35'),
(4, 'bodas', 'Bodas', '"Bodas" es un espacio para que guardes el mejor recuerdo de un d&iacute;a inolvidable. D&oacute;nde podr&aacute;s compartir la celebraci&oacute;n, antes, durante y despu&eacute;s. Manteniendo una continua comunicaci&oacute;n con los invitados para informar de todos los detalles de la boda: iglesia, sal&oacute;n, men&uacute;, listas de regalos, fotos. Adem&aacute;s los invitados podr&aacute;n confirmar su asistencia, enviar dedicatorias de boda, as&iacute; como, dietas especiales para confeccionar mejor el men&uacute;.<br /><br />', '2010-09-12 18:07:09', '2010-09-14 14:28:34'),
(5, 'contacto', 'Contacto', '<p style="text-align: center;">&nbsp;</p>\n<p style="text-align: center;"><strong>Patricia Armenault</strong> &ndash; 261 156179911<br /><strong>Mar&iacute;a Eugenia Burriguini</strong> &ndash; 261 155270538<br />Wedding Planners<br />info@uniquewp.com.ar<br />Ciudad Mendoza</p>', '2010-09-12 18:07:09', '2010-09-12 02:58:55'),
(6, 'footer', 'Footer', '', '2010-09-12 18:07:09', '2010-09-12 18:07:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `thumb` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `width` tinyint(4) NOT NULL,
  `height` tinyint(4) NOT NULL,
  `order` int(11) NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcar la base de datos para la tabla `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `thumb`, `image`, `width`, `height`, `order`, `last_modified`) VALUES
(1, '3_12843920084c8e444827b1b__06weddingsgreen_thumb.jpg', '3_12843920084c8e444827b1b__06weddingsgreen.jpg', 94, 70, 1, '0000-00-00 00:00:00'),
(3, '3_12843920684c8e44845c42a__weddingsbythesea5_thumb.jpg', '3_12843920684c8e44845c42a__weddingsbythesea5.jpg', 94, 70, 4, '2010-09-13 12:34:53'),
(13, '3_12843956284c8e526c29cbb__1196069610_ta_weddings_small_thumb.jpg', '3_12843956284c8e526c29cbb__1196069610_ta_weddings_small.jpg', 106, 70, 2, '2010-09-13 13:34:09'),
(14, '3_12843956324c8e527074126__weddings(main)_thumb.jpg', '3_12843956324c8e527074126__weddings(main).jpg', 94, 70, 3, '2010-09-13 13:34:09'),
(15, '6_12846647724c926dc40564f__battle-wedding-planners_thumb.jpg', '6_12846647724c926dc40564f__battle-wedding-planners.jpg', 94, 70, 5, '2010-09-16 16:20:17'),
(16, '6_12846647774c926dc9a0bac__bay-area-weddings_thumb.jpg', '6_12846647774c926dc9a0bac__bay-area-weddings.jpg', 94, 70, 6, '2010-09-16 16:20:17'),
(17, '6_12846647824c926dcedb212__copy-of-weddings-2008009_thumb.jpg', '6_12846647824c926dcedb212__copy-of-weddings-2008009.jpg', 96, 70, 7, '2010-09-16 16:20:17'),
(18, '6_12846647904c926dd635f4b__inglewood_7_stephanotis_weddings_thumb.jpg', '6_12846647904c926dd635f4b__inglewood_7_stephanotis_weddings.jpg', 94, 70, 8, '2010-09-16 16:20:17'),
(19, '6_12846647964c926ddcaa267__salon_boda_decoracion_thumb.jpg', '6_12846647964c926ddcaa267__salon_boda_decoracion.jpg', 104, 70, 9, '2010-09-16 16:20:17'),
(20, '6_12846648054c926de5d9160__wedding-planner-1_thumb.jpg', '6_12846648054c926de5d9160__wedding-planner-1.jpg', 70, 70, 10, '2010-09-16 16:20:17'),
(21, '6_12846648104c926dea15739__weddings_thumb.jpg', '6_12846648104c926dea15739__weddings.jpg', 88, 70, 11, '2010-09-16 16:20:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` bit(1) NOT NULL COMMENT '0=Invitado, 1=Administrador',
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`users_id`, `username`, `password`, `email`, `level`, `date_added`, `last_modified`) VALUES
(2, 'admin', 'Tj/YDjLaDSIolz5yYxCEaXMd23JUiBOl', 'iwmattoni@yahoo.com', b'1', '2010-08-23 19:07:45', '2010-09-04 12:35:17'),
(3, 'mydesign', 'v+vbQnjvohf+yyHs6ILVj3u4RNBrmlM6A/LwFg==', 'ivan@mydesign.com.ar', b'1', '2010-08-23 19:09:30', '2010-08-23 19:09:33'),
(4, 'federico', 'cIwxlI2zQSxoWKtxkfBXeQ==', '', b'1', '2010-08-23 19:07:45', '2010-08-23 19:07:45'),
(6, 'invitado', 'cIwxlI2zQSxoWKtxkfBXeQ==', '', b'0', '2010-09-15 18:36:41', '2010-09-15 18:36:41');
