<?php
namespace App\Repository\Statement;

use App\iLRS\ReturnResponse;
use App\Models\Statement;

class StatementRepository implements IStatementRepository
{
    /**
     * statement variable to create IStatementRepository $statement object
     * @var IStatementRepository
     */
    protected $statement;

    /**
     * StatementRepository constructor.
     * @param Statement $statements
     */
    public function __construct(Statement $statements)
    {
        $this->statement = $statements;
    }

    /**
     * @param $perPage
     * @return mixed
     */

    /**
     * Retun statement list in descending order with pagination
     * @param $perPage
     * @return mixed
     */
    public function getLogs($perPage)
    {
        $statements   =  $this->statement->latest('created_at')->paginate($perPage);
        return $statements;
    }

    /**
     * Create new Statement with inputs
     * @param $inputs
     */
    public function create($inputs)
    {
        $this->statement->statement = $inputs['statement'];
        $this->statement->save();
    }

    /**
     * Fetch statement with statement _id and the statement record
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->statement->findOrFail($id);
    }

    /**
     * Get statement record by Field Name
     * @param $fieldName
     * @param $id
     * @return mixed
     */
    public function findBy($fieldName, $id)
    {
        return $this->statement->where($fieldName, $id)->get()->toArray();
    }

    /**
     * Update statement record with id statement fields and data
     * @param $id
     * @param $updateField
     * @param $data
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update($id, $updateField, $data)
    {
        $returnResponse = new ReturnResponse();
        $fieldName = 'statement.id';
        $value = $id;
        $statementCount = $this->getCounByFieldNameAndValue($fieldName, $value);
        if($statementCount)
        {
            $this->statement->where('statement.id', $id)
                ->update([$updateField => $data]);
            return $returnResponse->jsonResponse('', '204','');
        }else{
            // Recheck the scenario and correct the error code
            return $returnResponse->jsonResponse('', '404','');
        }
    }

    /**
     * Get latest statement record
     * @return mixed
     */
    public function getLastCount()
    {
        return $this->statement->latest('created_at')->first();
    }

    /**
     * Get statement count by field name and value
     * @param $fieldName
     * @param $value
     * @return mixed
     */
    public function getCounByFieldNameAndValue($fieldName, $value)
    {
        return $this->statement->where($fieldName, $value)->count();
    }
}