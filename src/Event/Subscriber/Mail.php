<?php

namespace Event\Subscriber;

use \Event\Mail as MailEvent
  , \Events\Events
  , \Symfony\Component\EventDispatcher\EventSubscriberInterface;

class Mail implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            Events::MAIL_LISTMAILBOXES => array( 'listMailboxes', 0 )
        ];
    }

    public function listMailboxes( MailEvent $event )
    {

    }
}