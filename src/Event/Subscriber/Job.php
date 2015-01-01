<?php

namespace Event\Subscriber;

use \Silex\Application
  , \Event\Dispatch as DispatchEvent
  , \Event\Events
  , \Symfony\Component\EventDispatcher\EventSubscriberInterface;

class Job implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            Events::JOB_QUEUE => array( 'queue', 0 )
        ];
    }

    /**
     * Adds the job to the redis worker queue
     */
    public function queue( DispatchEvent $event )
    {
        
    }
}