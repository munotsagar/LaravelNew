<?php
namespace App\Repository\Statement;

interface IStatementRepository
{
    //public function all();

    public function create($inputs); //Create or Save New Statement

    public function update($id, $updateField, $data); //Update an existing Statement

    //public function delete();

    public function find($id); //Find or Get an Statement

    public function findBy($fieldName, $id); //Find Statement by FieldName

    public function getLastCount(); //Get Last Count of Collection

    public function getCounByFieldNameAndValue($fieldName, $value); //Get Count by Field Name and Value

    public function getLogs($perPage); //Get All Statements Paginated 


}