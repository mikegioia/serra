<?php

/**
 * Application Bootstrap
 *
 * This loads classes, config settings, constants and sets
 * up the DI services.
 */

use \Service\QueryBuilder
  , \Silex\Application
  , \Silex\Provider\DoctrineServiceProvider
  , \Symfony\Component\EventDispatcher\EventDispatcher;

// Define paths
define( "CONFIG_PATH", __DIR__ .'/../config' );
define( "SRC_PATH", __DIR__ );
define( "VENDOR_PATH", __DIR__ .'/../vendor' );

// Load vendor classes
$loader = require( VENDOR_PATH .'/autoload.php' );

// Load namespaces
$loader->add( 'Entity\\', SRC_PATH );
$loader->add( 'Event\\', SRC_PATH );
$loader->add( 'Mail\\', SRC_PATH );
$loader->add( 'Service\\', SRC_PATH );

// Create the application and include the configuration
$app = new Application();
$config = require( CONFIG_PATH .'/local.php' );

// Database service
$app->register(
    new DoctrineServiceProvider, [
        "db.options" => $config[ 'db.options' ],
    ]);

// Query Builder
$app[ 'qb' ] = $app->share(
    function () use ( $app ) {
        return new QueryBuilder( $app );
    });

// Event dispatcher
$app[ 'dispatcher' ] = $app->share(
    function () use ( $app ) {
        return new EventDispatcher();
    });