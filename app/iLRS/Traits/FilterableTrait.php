<?php
namespace App\iLRS\Traits;

trait FilterableTrait
{
    /**
     * valid filterable fields array to store field names
     * @var array
     */
    public $validFilterableFields = [];

    /**
     * Store valid filter fields in array
     * @var array
     *
     */
    public $filters = [];

    /**
     * Store voided filter related fields
     * @var array
     */
    public $voidedFilters = [];

    /**
     * Validate and store filter fields
     * @param $filters
     * @return bool
     */
    public function addFilter($filters)
    {
        foreach($filters as $field => $value)
        {
            if(!in_array($field, $this->validFilterableFields)) {
                continue;
            }

            /**
             * Add condition to make voidedFilters array 
             */
            if ($field == "voidedStatementId" || $field == "voided" || $field == "StatementRef") {
                $this->voidedFilters[config('ilrs-fieldmap.STATEMENT.'.$field)] = $value;
            } else {
                $this->filters[config('ilrs-fieldmap.STATEMENT.'.$field)] = $value;
            }

        }
        return true;
    }
}