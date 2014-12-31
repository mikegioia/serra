<?php

/**
 * CLI Interface Bootstrap
 *
 * This executes commands from the command line or a cron. The
 * main task here is to sync mail to MySQL.
 */

// Define paths
define( "CONFIG_PATH", __DIR__ .'/../config' );
define( "SRC_PATH", __DIR__ .'/../src' );
define( "VENDOR_PATH", __DIR__ .'/../vendor' );

// Load vendor classes
$loader = require( VENDOR_PATH .'/autoload.php' );

// Load namespaces
$loader->add( 'Entity\\', SRC_PATH );
$loader->add( 'Mail\\', SRC_PATH );
$loader->add( 'Service\\', SRC_PATH );

// Create the application and include the configuration
$app = new \Silex\Application();
$config = require( CONFIG_PATH .'/local.php' );

// Set up the service providers
// Database
$app->register(
    new \Silex\Provider\DoctrineServiceProvider, [
        "db.options" => $config[ 'db.options' ],
    ]);

// Entity Manager
$app[ 'em' ] = $app->share(
    function () {
        return new \Service\EntityManager();
    });

// Query Builder
$app[ 'qb' ] = $app->share(
    function () use ( $app ) {
        return new \Service\QueryBuilder( $app );
    });

// Parse command line arguments and execute the action(s)

$queryBuilder = $app[ 'qb' ]->create();
$results = $queryBuilder
    ->select( '*' )
    ->from( 'test' )
    ->execute()
    ->fetchAll();
$rows = $app[ 'qb' ]->populate( $results, 'Message' );
print_r($rows);

/*
Example to select rows and populate them
---
$queryBuilder = $app[ 'qb' ]->create();
$results = $queryBuilder
    ->select( '*' )
    ->from( 'test' )
    ->execute()
    ->fetchAll();
$rows = $app[ 'qb' ]->populate( $results, 'Message' );
// or \Service\EntityManager::populate( $results, 'Message' );
print_r($rows);


Example to insert row via Query Builder
---
$builder = $app[ 'db' ]->createQueryBuilder();
$builder
    ->insert( 'test' )
    ->values([
        'name' => "?",
        'title' => "?" ])
    ->setParameter( 0, "Mike Gioia" )
    ->setParameter( 1, "President" )
    ->execute();
*/