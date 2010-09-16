<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 				'rb');
define('FOPEN_READ_WRITE',			'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 	'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 			'ab');
define('FOPEN_READ_WRITE_CREATE', 		'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 		'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',	'x+b');


/*
|--------------------------------------------------------------------------
| NOMBRE DE LAS TABLAS (BASE DE DATO)
|--------------------------------------------------------------------------
*/
define('TBL_USERS',              'users');
define('TBL_GALLERY',            'gallery');
define('TBL_CONTENTS',           'contents');
define('TBL_BODAS',              'bodas');
define('TBL_REGALOS',            'bodas_regalos');
define('TBL_MENU',               'bodas_menu');

/*
|--------------------------------------------------------------------------
| MENSAJES DE ERROR PARA UPLOAD
|--------------------------------------------------------------------------
*/
define('ERR_UPLOAD_NOTUPLOAD', 'El archivo no ha podido llegar al servidor.');
define('ERR_UPLOAD_MAXSIZE', 'El tamaño del archivo debe ser menor a {size} MB.');
define('ERR_UPLOAD_FILETYPE', 'El tipo de archivo es incompatible.');

/*
|--------------------------------------------------------------------------
| EMAIL FORM CONTACTO
|--------------------------------------------------------------------------
*/
$msg = '<b>Nombre de la Novia:</b> {name_novia}<br />
<b>Nombre del Novio:</b> {name_novio}<br />
<b>Lugar de Residencia:</b> {lugar}<br />
<b>Fecha de Casamiento:</b> {fecha}<br />
<b>E-mail:</b> {mail}<br />
<b>Telefono:</b> {phone}<br />
<b>Consulta:</b><hr color="#000000" />{message}';
define('EMAIL_CONTACT_SUBJECT', 'Unique WP - Formulario Contacto');
define('EMAIL_CONTACT_MESSAGE', $msg);


/*
|--------------------------------------------------------------------------
| UPLOAD FILE
|--------------------------------------------------------------------------
*/
define('UPLOAD_FILETYPE', 'gif|jpg|png');
define('UPLOAD_MAXSIZE', 2048); //Expresado en Kylobytes

define('UPLOAD_PATH_GALLERY', './uploads/gallery/');
define('UPLOAD_PATH_BODAS', './uploads/bodas/');
define('UPLOAD_PATH_NOVIA', './uploads/bodas/novia/');
define('UPLOAD_PATH_NOVIO', './uploads/bodas/novio/');
define('UPLOAD_PATH_NOVIOS', './uploads/bodas/novios/');



define('IMAGE_THUMB_GALLERY_WIDTH', 108);
define('IMAGE_THUMB_GALLERY_HEIGHT', 70);
define('IMAGE_FULL_GALLERY_WIDTH', 515);
define('IMAGE_FULL_GALLERY_HEIGHT', 335);

define('IMAGE_THUMB_NOVIOS_WIDTH', 108);
define('IMAGE_THUMB_NOVIOS_HEIGHT', 70);
define('IMAGE_THUMB_PAREJA_WIDTH', 108);
define('IMAGE_THUMB_PAREJA_HEIGHT', 70);


/*
|--------------------------------------------------------------------------
| METADATA TITLE
|--------------------------------------------------------------------------
*/
define('TITLE_GLOBAL', 'Unique Wedding Planners - ');
define('TITLE_INDEX', 'Home');
define('TITLE_QUIENESOMOS', '¿Quienes Somos?');
define('TITLE_SERVICIOS', 'Servicios');
define('TITLE_MODALIDAD', 'Modalidad');
define('TITLE_GALERIA', 'Galería');
define('TITLE_BODAS', 'Bodas');
define('TITLE_CONTACTO', 'Contacto');
define('TITLE_NOVEDADES', 'Novedades');

/*
|--------------------------------------------------------------------------
| METADATA KEYWORDS
|--------------------------------------------------------------------------
*/
define('META_KEYWORDS_GLOBAL', '');
define('META_KEYWORDS_INDEX', '');
define('META_KEYWORDS_QUIENESOMOS', '');
define('META_KEYWORDS_SERVICIOS', '');
define('META_KEYWORDS_MODALIDAD', '');
define('META_KEYWORDS_GALERIA', '');
define('META_KEYWORDS_BODAS', '');
define('META_KEYWORDS_CONTACTO', '');
define('META_KEYWORDS_NOVEDADES', '');


/*
|--------------------------------------------------------------------------
| METADATA DESCRIPTIONS
|--------------------------------------------------------------------------
*/
define('META_DESCRIPTION_GLOBAL', '');
define('META_DESCRIPTION_INDEX', '');
define('META_DESCRIPTION_QUIENESOMOS', '');
define('META_DESCRIPTION_SERVICIOS', '');
define('META_DESCRIPTION_MODALIDAD', '');
define('META_DESCRIPTION_GALERIA', '');
define('META_DESCRIPTION_BODAS', '');
define('META_DESCRIPTION_CONTACTO', '');
define('META_DESCRIPTION_NOVEDADES', '');

/*
|--------------------------------------------------------------------------
| CONFIGURACION GENERAL
|--------------------------------------------------------------------------
*/
define('CACHE_TIME', 5);


/* End of file constants.php */
/* Location: ./system/application/config/constants.php */