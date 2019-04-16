<?php

// declaracion de principales CONSTANTES del aplicativo  (aqui van IDs, nombres y llaves maestras)
$json = file_get_contents('../app/config/config.json');
$config = json_decode($json);

//APP
define('APP_DIR',dirname(dirname(__FILE__)));

//URL
define('APP_URL',$config->app->urlroute);
define('SITE_NAME',$config->app->sitename);

?>