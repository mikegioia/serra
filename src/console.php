<?php

/**
 * CLI Interface
 *
 * This executes commands from the command line or a cron. The
 * main task here is to sync mail to MySQL.
 */

require( __DIR__ .'/bootstrap.php' );

// Parse command line arguments and execute the action(s)


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