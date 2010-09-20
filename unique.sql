-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-09-2010 a las 05:13:46
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

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

DROP TABLE IF EXISTS `bodas`;
CREATE TABLE IF NOT EXISTS `bodas` (
  `bodas_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
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
  `nombre_salon` varchar(255) NOT NULL,
  `nombre_iglesia` varchar(255) NOT NULL,
  `google_maps_salon` text NOT NULL,
  `google_maps_iglesia` text NOT NULL,
  `order` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`bodas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `bodas`
--

INSERT INTO `bodas` (`bodas_id`, `username`, `password`, `nombre_novio`, `apellido_novio`, `nombre_novia`, `apellido_novia`, `historia_novia`, `imagen_novia`, `imagen_novia_width`, `imagen_novia_height`, `historia_novio`, `imagen_novio`, `imagen_novio_width`, `imagen_novio_height`, `historia_novios`, `imagen_novios`, `imagen_novios_width`, `imagen_novios_height`, `nombre_salon`, `nombre_iglesia`, `google_maps_salon`, `google_maps_iglesia`, `order`, `date_added`, `last_modified`) VALUES
(4, 'invitado1', 'x+dpGsUF89MlH5RffDpOtETtmYo=', 'Gabriel', 'Asdfsf', 'Paula', 'Sdasd', 'asdasddsfjhasldf asdf asdfasdfas dfa sdfsdklfhaskdfh sdf ksdfhksdfsadf\nsdfsa dflksd lsdfhlsjkadfh sd flkhsadfl saldf asldfhlsudfyhsadf\nsadflsajdfhlsajdf asdlfhsaldfkhs dfsdflsdlf sdf sadfsdf asdf asdf  sadf asdfa\nsdfasdfasdfasdfasd\nfasdfsadf\nasdfasdflhasd', '3_12848646864c957aae1f82c__06weddingsgreen.jpg', 108, 81, 'asdasddsfjhasldf asdf asdfasdfas dfa sdfsdklfhaskdfh sdf ksdfhksdfsadf\nsdfsa dflksd lsdfhlsjkadfh sd flkhsadfl saldf asldfhlsudfyhsadf\nsadflsajdfhlsajdf asdlfhsaldfkhs dfsdflsdlf sdf sadfsdf asdf asdf  sadf asdfa\nsdfasdfasdfasdfasd\nfasdfsadf\nasdfasdflhasd', '3_12848647034c957abf2159f__1196069610_ta_weddings_small.jpg', 108, 72, 'asdasddsfjhasldf asdf asdfasdfas dfa sdfsdklfhaskdfh sdf ksdfhksdfsadf\nsdfsa dflksd lsdfhlsjkadfh sd flkhsadfl saldf asldfhlsudfyhsadf\nsadflsajdfhlsajdf asdlfhsaldfkhs dfsdflsdlf sdf sadfsdf asdf asdf  sadf asdfa\nsdfasdfasdfasdfasd\nfasdfsadf\nasdfasdflhasd', '3_12848647214c957ad1cc7fe__bodas-foto-1.jpg', 210, 300, 'quinta al amanecer', 'San Nicolás', '<iframe marginheight="0" marginwidth="0" src="http://maps.google.com.ar/?ie=UTF8&amp;ll=-32.886561,-68.856447&amp;spn=0.007604,0.013711&amp;z=16&amp;output=embed" frameborder="0" height="196" scrolling="no" width="362"></iframe>', '<iframe marginheight="0" marginwidth="0" src="http://maps.google.com.ar/?ie=UTF8&amp;ll=-32.886561,-68.856447&amp;spn=0.007604,0.013711&amp;z=16&amp;output=embed" frameborder="0" height="196" scrolling="no" width="362"></iframe>', 1, '2010-09-18 23:54:02', '2010-09-19 12:27:56'),
(5, 'invitado2', 'cex3cRgtsMo2Dx+mQjEsgP9dKCI=', 'Marcelo', 'Rwrwer', 'Laura', 'Dsasa', 'sdfsdfsdf sdfsdfsdfsdfsdf sdfsd\nsdfs\ndfsd fs df sa df asdf  sadf asd\nfasdfasdf as dñfkjaskdfj sadfasdflhasldf sadgfkgsadkfgsdk', '3_12848650414c957c119d67e__battle-wedding-planners.jpg', 108, 81, 'sdfsdfsdf sdfsdfsdfsdfsdf sdfsd\nsdfs\ndfsd fs df sa df asdf  sadf asd\nfasdfasdf as dñfkjaskdfj sadfasdflhasldf sadgfkgsadkfgsdk', '3_12848650604c957c2468273__salon_boda_decoracion.jpg', 108, 73, 'sdfsdfsdf sdfsdfsdfsdfsdf sdfsd\nsdfs\ndfsd fs df sa df asdf  sadf asd\nfasdfasdf as dñfkjaskdfj sadfasdflhasldf sadgfkgsadkfgsdk', '3_12848650764c957c348dc79__bodas-foto-2.jpg', 210, 300, '', '', 'fgdfg', 'ertert', 2, '2010-09-18 23:58:32', '0000-00-00 00:00:00'),
(6, 'invitado3', 'thoC6Lt4Kr82RFCuizPnQg==', 'Ivan', 'Sdfsdf', 'Valeria', 'Dafsd', 'sdfsdfsdf sdfsdfsdfsdfsdf sdfsd\nsdfs\ndfsd fs df sa df asdf  sadf asd\nfasdfasdf as dñfkjaskdfj sadfasdflhasldf sadgfkgsadkfgsdk', '3_12848652114c957cbb69813__1196069610_ta_weddings_small.jpg', 108, 72, 'sdfsdfsdf sdfsdfsdfsdfsdf sdfsd\nsdfs\ndfsd fs df sa df asdf  sadf asd\nfasdfasdf as dñfkjaskdfj sadfasdflhasldf sadgfkgsadkfgsdk', '3_12848651694c957c9121f79__bay-area-weddings.jpg', 108, 81, 'sdfsdfsdf sdfsdfsdfsdfsdf sdfsd\nsdfs\ndfsd fs df sa df asdf  sadf asd\nfasdfasdf as dñfkjaskdfj sadfasdflhasldf sadgfkgsadkfgsdk', '3_12848651414c957c75e7b99__bodas-foto-3.jpg', 210, 300, '', '', 'dsfsdf', 'rtert', 3, '2010-09-19 00:00:16', '0000-00-00 00:00:00'),
(7, 'invitado4', 'VSDHHgD/28/auWxRw1UPqA==', 'Diego', 'Fsdfsdf', 'Karina', 'Sdfsdf', 'sdfsdfsad fas df\nasd\nfas\ndfasdfasdf', '3_12848658434c957f33d5743__wedding-planner-1.jpg', 108, 108, 'sdfsdfsdfsdf', '3_12848658574c957f41bfd18__weddings.jpg', 108, 87, 'sdfsdfsdfsdf', '3_12848658704c957f4e23cda__bodas-foto-2.jpg', 210, 300, '', '', 'dfsd', 'dfsdfsdf', 4, '2010-09-19 00:11:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodas_gallery`
--

DROP TABLE IF EXISTS `bodas_gallery`;
CREATE TABLE IF NOT EXISTS `bodas_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `bodas_id` int(11) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `width` tinyint(4) NOT NULL,
  `height` tinyint(4) NOT NULL,
  `order` int(11) NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `bodas_gallery`
--

INSERT INTO `bodas_gallery` (`gallery_id`, `bodas_id`, `thumb`, `image`, `width`, `height`, `order`, `last_modified`) VALUES
(10, 4, '3_12848648064c957b263d712__battle-wedding-planners_thumb.jpg', '3_12848648064c957b263d712__battle-wedding-planners.jpg', 94, 70, 1, '2010-09-18 23:54:02'),
(11, 4, '3_12848648104c957b2aaffd4__06weddingsgreen_thumb.jpg', '3_12848648104c957b2aaffd4__06weddingsgreen.jpg', 94, 70, 2, '2010-09-18 23:54:02'),
(12, 4, '3_12848648144c957b2ed92ec__1196069610_ta_weddings_small_thumb.jpg', '3_12848648144c957b2ed92ec__1196069610_ta_weddings_small.jpg', 106, 70, 3, '2010-09-18 23:54:02'),
(13, 4, '3_12848648214c957b3554022__bay-area-weddings_thumb.jpg', '3_12848648214c957b3554022__bay-area-weddings.jpg', 94, 70, 4, '2010-09-18 23:54:02'),
(14, 4, '3_12848648264c957b3a9ea22__bay-area-weddings_thumb.jpg', '3_12848648264c957b3a9ea22__bay-area-weddings.jpg', 94, 70, 5, '2010-09-18 23:54:02'),
(15, 4, '3_12848648314c957b3f7f3ec__salon_boda_decoracion_thumb.jpg', '3_12848648314c957b3f7f3ec__salon_boda_decoracion.jpg', 104, 70, 6, '2010-09-18 23:54:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodas_menus`
--

DROP TABLE IF EXISTS `bodas_menus`;
CREATE TABLE IF NOT EXISTS `bodas_menus` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `bodas_id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Volcar la base de datos para la tabla `bodas_menus`
--

INSERT INTO `bodas_menus` (`menu_id`, `bodas_id`, `menu`) VALUES
(54, 5, 'dfgdfg'),
(55, 5, 'retret'),
(56, 6, 'ewtrert'),
(57, 7, 'sdfsdfsd'),
(73, 4, 'sdfsd'),
(74, 4, 'werwe'),
(75, 4, 'gdfgdf'),
(76, 4, 'rtyrty'),
(77, 4, 'wewe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodas_regalos`
--

DROP TABLE IF EXISTS `bodas_regalos`;
CREATE TABLE IF NOT EXISTS `bodas_regalos` (
  `regalo_id` int(11) NOT NULL AUTO_INCREMENT,
  `bodas_id` int(11) NOT NULL,
  `regalo` varchar(255) NOT NULL,
  PRIMARY KEY (`regalo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Volcar la base de datos para la tabla `bodas_regalos`
--

INSERT INTO `bodas_regalos` (`regalo_id`, `bodas_id`, `regalo`) VALUES
(68, 5, 'dfgdfg'),
(69, 5, 'werer'),
(70, 6, 'dfgdf'),
(71, 7, 'werwer'),
(84, 4, 'regalo1'),
(85, 4, 'regalo2'),
(86, 4, 'regalo3'),
(87, 4, 'regalo4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
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
('8a6c51f77d66bae2c6ab37f66e2e1010', '192.168.1.3', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES; rv', 1284947942, 'a:3:{s:9:"logged_in";s:1:"1";s:5:"level";s:1:"1";s:8:"users_id";s:1:"3";}'),
('05d43cfb076ca7339912857d9a3f35b4', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.2.8', 1284949394, ''),
('7a42f700585fd83566947975fb816a54', '192.168.1.3', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.2.8', 1284950736, ''),
('8eef837841e1f9d211b6a519c457f114', '192.168.1.3', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1;', 1284950954, 'a:2:{s:9:"logged_in";s:1:"1";s:8:"bodas_id";s:1:"4";}'),
('70635708a369ae498fe3db1e9b96e187', '192.168.1.3', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES; rv', 1284950525, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

DROP TABLE IF EXISTS `contents`;
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
(6, 'footer', 'Footer', '<p><a href="/trabajos/unique.git/index.php/"><img src="/trabajos/unique.git/uploads/kcfinder/image/iconos/icon_facebook.png" alt="Facebook" width="32" height="32" /></a>&nbsp;&nbsp;<a href="/trabajos/unique.git/index.php/"><img src="/trabajos/unique.git/uploads/kcfinder/image/iconos/icon_twitter.png" alt="Twitter" width="32" height="32" /></a></p>', '2010-09-12 18:07:09', '2010-09-19 19:45:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

DROP TABLE IF EXISTS `gallery`;
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

DROP TABLE IF EXISTS `users`;
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
