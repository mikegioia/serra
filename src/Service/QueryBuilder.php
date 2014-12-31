<?php

namespace Service;

use Silex\Application;

class QueryBuilder
{
    private $db;
    private $em;

    public function __construct( Application $app )
    {
        $this->db = $app[ 'db' ];
        $this->em = $app[ 'em' ];
    }

    public function create()
    {
        return $this->db->createQueryBuilder();
    }

    public function populate( $dbRows, $className, $index = FALSE )
    {
        return $this->em->populate( $dbRows, $className, $index );
    }
}