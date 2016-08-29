<?php

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CreateCustomerauditsTable extends Eloquent
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    protected $collection = 'CustomerAudit';

    public function up()
    {
        Schema::create('CustomerAudit', function($collection)
        {
            $collection->increments('id');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CustomerAudit');
    }
}
