<?php

namespace Entity;

class Base
{
    public function __construct( $row )
    {
        foreach ( $row as $key => $val )
        {
            $this->$key = $val;
        }
    }
}