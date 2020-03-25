<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Log
 * @package app\Models
 */
class Log extends DataLayer
{
    /**
     * Log constructor.
     */
    public function __construct()
    {
        parent::__construct("logs", [
            "log_message",//required field
            //"name",// Not required field
            //"email",// Notrequired field
            //"cpf",// Not required field
            //"phone"// Not required field
        ]);
    }
}