<?php
// define a barra de separaÃ§Ã£o de diretÃ³rios
defined('DS') 
	|| define( 'DS', DIRECTORY_SEPARATOR );

// Define path to root directory
defined( 'APPLICATION_ROOT' )
    || define( 'APPLICATION_ROOT', realpath( __DIR__ . DS .'..'. DS ) );

// Define path to application directory
defined( 'APPLICATION_PATH' )
    || define( 'APPLICATION_PATH', APPLICATION_ROOT . DS . 'App' );

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    APPLICATION_ROOT,
    APPLICATION_PATH,
   // APPLICATION_ROOT . DS .'CardinalPoint',
    get_include_path(),
)));

require_once 'ClassLoader.php';

$loader = new UniversalClassLoader();
 
// register classes with namespaces
$loader->registerNamespaces(array(
	'App' => APPLICATION_PATH,
));

// to enable searching the include path (eg. for PEAR packages)
$loader->useIncludePath( true );

$loader->register();
 