<?php
/**
* Base rule file Uinsu-Web-Framework
*/

/**
* URL base, jika di upload ke hosting, perhatikan http/https, karena akan berpengaruh
*/
$homeBase = 'http://localhost/Nadha-Resto/';

/**
* Site name (nama situs web)
*/
$siteName = 'Nadha Resto - Aplikasi Manajemen Restoran';

/**
* Author (Pengembang / pemilik website)
*/
$author = 'Haxorsprogramming';

/**
* Default route
*/
$mainRoute = 'home';

/**
* Path to  style asset (css, js, dll)
*/
$styleBase = $homeBase.'ladun';

/**
* Define to public
*/
define('HOMEBASE', $homeBase);
define('SITENAME', $siteName);
define('AUTHOR', $author);
define('MAINROUTE', $mainRoute);
define('STYLEBASE', $styleBase);



