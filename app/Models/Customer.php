<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class Customer extends Moloquent
{
    /**
     * Added Collection name to manage Customers records
     * @var string
     */
    protected $collection = 'Customers';
}
