-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-09-2010 a las 03:58:48
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
('090b4598a9e9c47eddf5ed6151220b5a', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.2.8', 1284343000, 'a:6:{s:8:"users_id";s:1:"3";s:8:"username";s:8:"mydesign";s:5:"email";s:20:"ivan@mydesign.com.ar";s:10:"date_added";s:19:"2010-08-23 19:09:30";s:13:"last_modified";s:19:"2010-08-23 19:09:33";s:9:"logged_in";s:1:"1";}'),
('fe66c892adb56460a3a5a1a20af1d57b', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.2.8', 1284333730, 'a:6:{s:8:"users_id";s:1:"3";s:8:"username";s:8:"mydesign";s:5:"email";s:20:"ivan@mydesign.com.ar";s:10:"date_added";s:19:"2010-08-23 19:09:30";s:13:"last_modified";s:19:"2010-08-23 19:09:33";s:9:"logged_in";s:1:"1";}');

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
(2, 'servicios', 'Servicios', '<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><em><strong>Unique WP </strong></em></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"> </span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>cuenta con 3 paquetes</strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">:</span></span></p>\n<p lang="es-ES"><span style="color: #000000;"> </span></p>\n<ol>\n<li>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Paquete 	Integral</strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">: 	Destinado a novios que desean una completa organizaci&oacute;n, confiando 	en nosotros todos los detalles.</span></span></p>\n</li>\n<li>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Paquete 	Coordinaci&oacute;n</strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">: 	Pertinentes a aquellas parejas que han contratado determinada 	cantidad de servicios y desean adquirir apoyo profesional en la 	elecci&oacute;n de los faltantes, detalles determinados y la coordinaci&oacute;n 	del d&iacute;a de la boda.</span></span></p>\n</li>\n<li>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Paquete 	&ldquo;D&iacute;a D&rdquo;</strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">: 	Orientados a aquellos que han organizado su casamiento en su 	totalidad, pero desean disfrutar y relajarse, sin la preocupaci&oacute;n 	de todas las eventualidades que pueden surgir ese d&iacute;a, contratando 	el servicio de coordinaci&oacute;n de ese momento. (para ello es necesario 	contar con dos semanas previas de informaci&oacute;n sobre todo lo 	referido a la boda) </span></span></p>\n</li>\n</ol>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Damos asesoramiento sobre la totalidad de los servicios necesarios para garantizar el &eacute;xito de la celebraci&oacute;n, desde el inicio hasta su finalizaci&oacute;n.</span></span></p>\n<ul>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Ceremonia 	civil.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Ceremonia 	religiosa.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Lugar 	(sal&oacute;n, hotel, quinta).</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Armados 	de carpas.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Catering.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Barras.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Ambientaci&oacute;n.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Djs, 	sonido e iluminaci&oacute;n.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Fotograf&iacute;a 	y video.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Vestimenta 	de novia/o, madrinas y padrinos.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Peinado 	y make up.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Arreglo 	florares.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Alianzas.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Lista 	de regalos</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Invitaciones.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Servicio 	de confirmaci&oacute;n de asistencia.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Movilidad 	para novios. (en el caso de ser necesario, para invitados)</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Reservas 	de alojamientos de invitados.</span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Tarjetas 	de salutaci&oacute;n </span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Noches 	de boda.</span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><img style="float: right;" src="/trabajos/unique.git/uploads/kcfinder/image/servicios-foto.png" alt="" width="241" height="156" /></span></span></p>\n</li>\n<li>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Luna 	de miel.</span></span></p>\n</li>\n</ul>', '2010-09-12 18:07:09', '2010-09-12 02:41:41'),
(3, 'modalidad', 'Modalidad', '<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Etapas del servicio:</strong></span></span></p>\n<p lang="es-ES"><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Para llevar a cabo eficazmente la organizaci&oacute;n y coordinaci&oacute;n del evento contamos con 5 etapas principales:</span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><img style="float: right;" src="/trabajos/unique.git/uploads/kcfinder/image/modalidad-foto.png" alt="" width="339" height="422" /></span></span></p>\n<ol>\n<li>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Planificaci&oacute;n 	y organizaci&oacute;n</strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">: 	En principio, se determina el concepto o tem&aacute;tica de la boda, se 	define el presupuesto total aproximado y se inicia una gu&iacute;a con los 	pasos y procesos para la optimizaci&oacute;n de la organizaci&oacute;n, donde se 	establece un cronograma con las acciones desde el inicio de la 	planificaci&oacute;n hasta su finalizaci&oacute;n.</span></span><span style="color: #000000;"></span></p>\n</li>\n<li>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Realizaci&oacute;n, 	direcci&oacute;n y control</strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">: 	Orientado a la ejecuci&oacute;n de lo pautado y su seguimiento y control 	para evitar futuras eventualidades. Comprende la b&uacute;squeda y 	selecci&oacute;n de los proveedores acordes al acontecimiento, programar 	las entrevistas en funci&oacute;n de las necesidades operativas, revisi&oacute;n 	permanente de situaciones cr&iacute;ticas, disponibilidad del mobiliario y 	ubicaci&oacute;n de invitados y proveedores, confirmaci&oacute;n de asistencia, 	gesti&oacute;n hotelera y de traslado, manejo de la sincronizaci&oacute;n del 	evento, acompa&ntilde;amiento, asesoramiento y supervisi&oacute;n continua.</span></span></p>\n</li>\n<li>\n<p><span style="color: #000000;">&ldquo;</span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>D&iacute;a 	D&rdquo;:</strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"> Se refiere a la log&iacute;stica y coordinaci&oacute;n del d&iacute;a de la boda, 	poniendo en pr&aacute;ctica todo lo planeado anteriormente, verificando 	acciones para obtener soluciones ante situaciones no previstas, 	dirigiendo todos los servicios para su correcta ejecuci&oacute;n en tiempo 	y forma. Para ello se cuenta con la presencia del profesional 	durante el armado y el desarrollo del evento.</span></span></p>\n</li>\n<li>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Post-evento: </strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;">Nos 	ocupamos de verificar y controlar el estado de los materiales 	utilizados por los proveedores. Y adem&aacute;s se enviar&aacute; tarjetas de 	salutaci&oacute;n. </span></span></p>\n</li>\n<li>\n<p><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"><strong>Fidelizaci&oacute;n 	al cliente:</strong></span></span><span style="color: #000000;"><span style="font-family: Arial,sans-serif;"> Posterior contacto con los reci&eacute;n casados. </span></span></p>\n</li>\n</ol>', '2010-09-12 18:07:09', '2010-09-12 02:50:35'),
(4, 'bodas', 'Bodas', '<p>"Bodas" es un espacio para que guardes el mejor recuerdo inolvidable</p>', '2010-09-12 18:07:09', '2010-09-12 02:52:33'),
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
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `gallery`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`users_id`, `username`, `password`, `email`, `date_added`, `last_modified`) VALUES
(2, 'admin', 'Tj/YDjLaDSIolz5yYxCEaXMd23JUiBOl', 'iwmattoni@yahoo.com', '2010-08-23 19:07:45', '2010-09-04 12:35:17'),
(3, 'mydesign', 'v+vbQnjvohf+yyHs6ILVj3u4RNBrmlM6A/LwFg==', 'ivan@mydesign.com.ar', '2010-08-23 19:09:30', '2010-08-23 19:09:33');
