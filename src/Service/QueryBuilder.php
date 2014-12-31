<?php

namespace Service;

use Silex\Application
  , Entity\Base as EntityManager;

class QueryBuilder
{
    private $db;
    private $em;

    public function __construct( Application &$app )
    {
        $this->db = $app[ 'db' ];
    }

    public function create()
    {
        return $this->db->createQueryBuilder();
    }

    public function populate( $dbRows, $className, $index = FALSE )
    {
        return EntityManager::populate( $dbRows, $className, $index );
    }
}