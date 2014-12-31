<?php

/**
 * Master configuration
 *
 * Other profiles inherit from this.
 */

return [
    "db.options" => [
        "driver" => "pdo_mysql",
            "host" => "localhost",
            "dbname" => "serra",
            "user" => "",
            "password" => "",
            "charset" => "utf8"
    ]];