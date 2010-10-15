-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-10-2010 a las 14:32:13
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
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha` char(10) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `bodas`
--

INSERT INTO `bodas` (`bodas_id`, `username`, `password`, `fecha`, `nombre_novio`, `apellido_novio`, `nombre_novia`, `apellido_novia`, `historia_novia`, `imagen_novia`, `imagen_novia_width`, `imagen_novia_height`, `historia_novio`, `imagen_novio`, `imagen_novio_width`, `imagen_novio_height`, `historia_novios`, `imagen_novios`, `imagen_novios_width`, `imagen_novios_height`, `nombre_salon`, `nombre_iglesia`, `google_maps_salon`, `google_maps_iglesia`, `order`, `date_added`, `last_modified`) VALUES
(4, 'invitado1', 'Xa8PXiKgcqCFztghqBMNHaM0iGA=', '1288299600', 'Gabriel', 'Asdfsf', 'Paula', 'Sdasd', 'asdasddsfjhasldf asdf asdfasdfas dfa sdfsdklfhaskdfh sdf ksdfhksdfsadf\nsdfsa dflksd lsdfhlsjkadfh sd flkhsadfl saldf asldfhlsudfyhsadf\nsadflsajdfhlsajdf asdlfhsaldfkhs dfsdflsdlf sdf sadfsdf asdf asdf  sadf asdfa\nsdfasdfasdfasdfasd\nfasdfsadf\nasdfasdflhasd', '3_12848646864c957aae1f82c__06weddingsgreen.jpg', 108, 81, 'asdasddsfjhasldf asdf asdfasdfas dfa sdfsdklfhaskdfh sdf ksdfhksdfsadf\nsdfsa dflksd lsdfhlsjkadfh sd flkhsadfl saldf asldfhlsudfyhsadf\nsadflsajdfhlsajdf asdlfhsaldfkhs dfsdflsdlf sdf sadfsdf asdf asdf  sadf asdfa\nsdfasdfasdfasdfasd\nfasdfsadf\nasdfasdflhasd', '3_12848647034c957abf2159f__1196069610_ta_weddings_small.jpg', 108, 72, 'asdasddsfjhasldf asdf asdfasdfas dfa sdfsdklfhaskdfh sdf ksdfhksdfsadf\nsdfsa dflksd lsdfhlsjkadfh sd flkhsadfl saldf asldfhlsudfyhsadf\nsadflsajdfhlsajdf asdlfhsaldfkhs dfsdflsdlf sdf sadfsdf asdf asdf  sadf asdfa\nsdfasdfasdfasdfasd\nfasdfsadf\nasdfasdflhasd', '3_12848647214c957ad1cc7fe__bodas-foto-1.jpg', 210, 300, 'quinta al amanecer', 'San Nicolás', '<iframe marginheight="0" marginwidth="0" src="http://maps.google.com.ar/?ie=UTF8&amp;ll=-32.886561,-68.856447&amp;spn=0.007604,0.013711&amp;z=16&amp;output=embed" frameborder="0" height="196" scrolling="no" width="362"></iframe>', '<iframe marginheight="0" marginwidth="0" src="http://maps.google.com.ar/?ie=UTF8&amp;ll=-32.886561,-68.856447&amp;spn=0.007604,0.013711&amp;z=16&amp;output=embed" frameborder="0" height="196" scrolling="no" width="362"></iframe>', 6, '2010-09-18 23:54:02', '2010-10-14 12:48:30'),
(5, 'invitado2', 'HJrAeQa1bPL2/n9CtDpz3qfMNk8=', '', 'Eduardo', 'Rwrwer', 'Andrea', 'Dsasa', 'sdfsdfsdf sdfsdfsdfsdfsdf sdfsd\nsdfs\ndfsd fs df sa df asdf  sadf asd\nfasdfasdf as dñfkjaskdfj sadfasdflhasldf sadgfkgsadkfgsdk', '3_12848650414c957c119d67e__battle-wedding-planners.jpg', 108, 81, 'sdfsdfsdf sdfsdfsdfsdfsdf sdfsd\nsdfs\ndfsd fs df sa df asdf  sadf asd\nfasdfasdf as dñfkjaskdfj sadfasdflhasldf sadgfkgsadkfgsdk', '3_12848650604c957c2468273__salon_boda_decoracion.jpg', 108, 73, 'sdfsdfsdf sdfsdfsdfsdfsdf sdfsd\nsdfs\ndfsd fs df sa df asdf  sadf asd\nfasdfasdf as dñfkjaskdfj sadfasdflhasldf sadgfkgsadkfgsdk', '3_12848650764c957c348dc79__bodas-foto-2.jpg', 210, 300, 'erere', 'erert', '<iframe marginheight="0" marginwidth="0" src="http://maps.google.com.ar/?ie=UTF8&amp;ll=-32.892854,-68.84442&amp;spn=0.001946,0.004823&amp;z=18&amp;output=embed" frameborder="0" height="196" scrolling="no" width="362"></iframe>', '<iframe marginheight="0" marginwidth="0" src="http://maps.google.com.ar/?ie=UTF8&amp;ll=-32.892854,-68.84442&amp;spn=0.001946,0.004823&amp;z=18&amp;output=embed" frameborder="0" height="196" scrolling="no" width="362"></iframe>', 5, '2010-09-18 23:58:32', '2010-09-20 14:46:58'),
(6, 'invitado3', 'rOCCvbqaRImpMk284LbsYQ==', '1288170540', 'Guillermo', 'Sdfsdf', 'Veronica', 'Dafsd', 'sdfsdfsdf sdfsdfsdfsdfsdf sdfsd\nsdfs\ndfsd fs df sa df asdf  sadf asd\nfasdfasdf as dñfkjaskdfj sadfasdflhasldf sadgfkgsadkfgsdk', '3_12848652114c957cbb69813__1196069610_ta_weddings_small.jpg', 108, 72, 'sdfsdfsdf sdfsdfsdfsdfsdf sdfsd\nsdfs\ndfsd fs df sa df asdf  sadf asd\nfasdfasdf as dñfkjaskdfj sadfasdflhasldf sadgfkgsadkfgsdk', '3_12848651694c957c9121f79__bay-area-weddings.jpg', 108, 81, 'sdfsdfsdf sdfsdfsdfsdfsdf sdfsd\nsdfs\ndfsd fs df sa df asdf  sadf asd\nfasdfasdf as dñfkjaskdfj sadfasdflhasldf sadgfkgsadkfgsdk', '3_12848651414c957c75e7b99__bodas-foto-3.jpg', 210, 300, 'sdfsd', 'werwer', '<iframe marginheight="0" marginwidth="0" src="http://maps.google.com.ar/?ie=UTF8&amp;ll=-32.892854,-68.84442&amp;spn=0.001946,0.004823&amp;z=18&amp;output=embed" frameborder="0" height="196" scrolling="no" width="362"></iframe>', '<iframe marginheight="0" marginwidth="0" src="http://maps.google.com.ar/?ie=UTF8&amp;ll=-32.892854,-68.84442&amp;spn=0.001946,0.004823&amp;z=18&amp;output=embed" frameborder="0" height="196" scrolling="no" width="362"></iframe>', 4, '2010-09-19 00:00:16', '2010-10-14 11:06:02');
