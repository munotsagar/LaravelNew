<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class CustomerAudit extends Moloquent
{
    /**
     * Added Collection name to manage CustomerAudit records
     * @var string
     */
    protected $collection = 'CustomerAudit';
}
