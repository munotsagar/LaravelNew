<?php

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CreateCustomersTable extends Eloquent
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    protected $collection = 'Customers';

    public function up()
    {
        Schema::create('Customers', function($collection)
        {
            $collection->increments('id');
            $collection->index('username');
            $collection->index('password');
            $collection->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Customers');
    }
}
