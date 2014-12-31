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

    public static function populate( $dbRows, $className, $index = NULL )
    {
        $class = "Entity\\". $className;
        $return = [];

        foreach ( $dbRows as $row )
        {
            if ( $index && isset( $row->$index ))
            {
                $return[ $row->$index ] = new $class( $row );
            }
            else
            {
                $return[] = new $class( $row );
            }
        }

        return $return;
    }
}