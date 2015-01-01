<?php

namespace Event;

use \Event\Events;

class Job extends \Event\Base
{
    private $task;

    public function __construct( $task = "" )
    {
        $this->type = Events::JOB;
        $this->task = $task;
    }

    public function __toString()
    {
        return serialize([
            'task' => $this->task
        ]);
    }

    public function getTask()
    {
        return $this->task;
    }
}