<?php

/**
 * CLI Interface
 *
 * This executes commands from the command line or a cron. The
 * main task here is to sync mail to MySQL.
 */

require( __DIR__ .'/bootstrap.php' );

// Parse command line arguments and execute the action(s)

// set up a subsriber for test.ping
$subscriber = new \Event\Subscriber\Test();
$app[ 'dispatcher' ]->addSubscriber( $subscriber );

// dispatch an event for test.ping
$event = new \Event\Test( "hello world" );
echo "Sending ping...", PHP_EOL;
$app[ 'dispatcher' ]->dispatch( \Event\Events::TEST_PING, $event );

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