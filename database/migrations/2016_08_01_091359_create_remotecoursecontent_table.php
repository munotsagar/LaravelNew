<?php

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CreateRemotecoursecontentTable extends Eloquent
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $collection = 'RemoteCourseContent';
    public function up() {

        Schema::create('RemoteCourseContent', function($collection)
        {
            $collection->increments('id');
            $collection->index('statement.id');
            $collection->string('statement.active.objectType');
            $collection->string('statement.active.name');
            $collection->string('statement.active.mbox');

            $collection->string('statement.verb.id');
            $collection->string('statement.verb.display.de-DE');
            $collection->string('statement.verb.display.en-US');
            $collection->string('statement.verb.display.fr-FR');
            $collection->string('statement.verb.display.es-ES');

            $collection->string('statement.object.objectType');
            $collection->string('statement.object.id');
            $collection->string('statement.object.definition.name.en-US');
            $collection->string('statement.object.definition.description.en-US');
            $collection->string('statement.object.display.es-ES');

            $collection->string('statement.context.registration');

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
        Schema::drop('RemoteCourseContent');
    }
}
