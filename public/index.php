<?php

//headers
require_once('../app/config/headers.php');

//archivo de configuracion de php
require_once('../app/config/ini.php');

//archivos
require_once('../app/core/manager.php');

//archivos de configuracion
require_once('../app/config/config.php');

//controlador maestro
require_once('../app/controller/classes/controller.php');

//enrutador
require_once('../app/core/router.php');

$router = new Router();

?>