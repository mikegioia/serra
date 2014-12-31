<?php

namespace Event;

use Symfony\Component\EventDispatcher\Event;

class Test extends Event
{
    private $message;

    public function __construct( $message = "" )
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }
}