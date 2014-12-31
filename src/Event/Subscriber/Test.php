<?php

namespace Event\Subscriber;

use \Event\Test as TestEvent
  , \Event\Events
  , \Symfony\Component\EventDispatcher\EventSubscriberInterface;

class Test implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            Events::TEST_PING => array( 'ping', 0 )
        ];
    }

    public function ping( TestEvent $event )
    {
        echo "Pong: ", $event->getMessage(), PHP_EOL;
    }
}