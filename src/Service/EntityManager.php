<?php

namespace Service;

class EntityManager
{
    public function __construct() {}

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