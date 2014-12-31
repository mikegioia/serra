<?php

namespace Entity;

class Message
{
    public $id;
    public $name;
    public $title;

    public function __construct( $row )
    {
        foreach ( $row as $key => $val )
        {
            $this->$key = $val;
        }
    }
}