<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class RemoteStatement extends Moloquent
{
    /**
     * Added Collection name to manage RemoteCourseContent records
     * @var string
     */
    protected $collection = 'RemoteCourseContent';
    /**
     * Adde hidden fields in
     * @var array
     */
    public $hidden = ['created_at', 'updated_at'];
    /**
     * $fillable contains the field names which we can add expernaly into db
     * @var array
     */
    public $fillable = ['_id', 'statement'];
    /**
     * Added created_at in $dates array which well help convert created_at date in Carbon\Carbon formatted date
     * @var array
     */
    protected $dates    = ['created_at']; // eg: $statement->created_at->format('Y-m-d');
}
