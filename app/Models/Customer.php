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
        parent::__construct("customer", [
            "name",
            "email",
            "cpf",
            "phone",
        ]);
    }
}