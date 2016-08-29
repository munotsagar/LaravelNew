<?php

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CreateDebuglogsTable extends Eloquent
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $collection = 'DebugLogs';
    public function up() {

        Schema::create('DebugLogs', function($collection)
        {
            $collection->increments('id');

            $collection->timestamp('created_at');
            $collection->timestamp('updated_at');
        });
        
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    // we really don't want to remove this indexes
        Schema::drop('DebugLogs');
    }
}
