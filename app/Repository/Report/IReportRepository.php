<?php
namespace App\Repository\Report;

interface IReportRepository
{
    public function findDistinctBy($distinctField, $fieldName, $fieldValue); // Find distinct records with given field name and value

}