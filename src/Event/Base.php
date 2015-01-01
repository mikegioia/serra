<?php

namespace Event;

use \Symfony\Component\EventDispatcher\Event;

class Base extends Event
{
    public $type;

    public function __toString()
    {
        return $this->type;
    }
}