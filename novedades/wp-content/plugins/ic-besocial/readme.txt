=== ic BeSocial ===
Contributors: Jose Cuesta
Tags: social, share, button, facebook, twitter, meneame, bitacoras
Requires at least: 2.9
Tested up to: 2.9.2
Stable tag: 1.4

== Description ==

Genera botones para el envío o la votación en distintas redes sociales: Facebook, Twitter, Meneame y Bitacoras.com. Opcionalmente puede mostrar contadores con el número de votos o veces que se ha compartido (según la red). Los botones se muestran únicamente en las entradas individuales.

También genera automáticamente las URLs cortas mediante Bit.ly al publicar las entradas (aparecen en una caja de la pantalla de edición para poder consultarlas).

Los botones pueden ser insertados de manera automática (por defecto) o manualmente (mediante la función `ic_BeSocial_Buttons()` en single.php), y funcionan de la siguiente manera:

* **Meneame**: permite enviar la entrada a Meneame o votarla si ya ha sido enviada, pero si la entrada ha sido descartada en Meneame el botón no aparecerá. El contador muestra el número de votos (meneos).
* **Bitacoras.com**: permite envitar la entrada a Bitacoras.com o votarla si ya ha sido enviada. El contador muestra el número de votos.
* **Facebook**: permite compartir la entrada en Facebook. El contador muestra el número de gente que ha compartido la entrada y el número de gente que le gusta en Facebook.
* **Twitter**: permite retweetear la entrada. El contador muestra el número de retweets.

Este plugin ha sido desarrollado por [Inercia Creativa](http://www.inerciacreativa.com/) para el [blog de Maikelnai](http://www.maikelnai.es) y liberado para uso y disfrute público.

== Changelog ==

= 1.4 =
* Se utiliza Tweetmeme en vez de Bit.ly para contar RT en vez de clicks

= 1.3.4 =
* Traducción al español

= 1.3.3 =
* Posibilidad de ajustar la posición y alineamiento de los botones
* Posibilidad de insertar los botones manualmente mediante `ic_BeSocial_Buttons()` (en la plantilla single.php)

= 1.3.2 =
* Correcciones en las hojas de estilos

= 1.3 =
* Compatibilidad con PHP 4
* Corregido error en el valor por defecto de las opciones

= 1.2 =
* Todos los contadores funcionan por JSONP
* Reescritura del botón de Meneame

= 1.1 =
* Añadido botón de Bitacoras.com

= 1.0 =
* Reescritura total

= 0.2 =
* Añadido soporte para WPTouch

= 0.1 =
* Primera versión en funcionamiento
