<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Customer
 * @package app\Models
 */
class Customer extends DataLayer
{
    /**
     * Customer constructor.
     */
    public function __construct()
    {
        parent::__construct("customers", [
            "name",//required field
            "email",//required field
            "cpf",//required field
            //"phone" Not required field
        ]);
    }
}