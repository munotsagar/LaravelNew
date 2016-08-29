<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
use Carbon\Carbon;

class Statement extends Moloquent
{
    public $collection = 'CourseContent';
    public $hidden = ['created_at', 'updated_at'];
    public $fillable = ['_id', 'statement', 'active', 'voided', 'refs', 'lrs_id', 'timestamp', 'stored'];
    protected $dates    = ['created_at']; // $statement->created_at->format('Y-m-d');
}
