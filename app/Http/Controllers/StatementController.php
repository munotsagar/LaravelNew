<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;

use Request;

use Response;

use App\Models\Statement;

use App\IlrsCore\IlrsCoreStatement;

use App\Repository\Statement\IStatementRepository;

use App\Repository\Filter\IStatementFilterRepository;

use App\iLRS\ReturnResponse;

class StatementController extends ApiBaseController
{
    /**
     * Add statement constant to use statement field name on multiple location
     */
    const STATEMENT = "statement";

    /**
     *  LOCATION constant contain Location header parameter
     */
    const LOCATION = "Location";

    /**
     * PAGE constant contain page parameter for pagination
     */
    const PAGE = "page";
    /**
     * statement variable to create IStatementRepository $statement object
     * @var IStatementRepository
     */
    protected $statement;

    /**
     * filter variable to create IStatementRepository $statement object
     * @var IStatementRepository
     */
    protected $filter;

    /**
     * Object of ReturnResponse class to call jsonResponse method to handle status code, response data and error message
     * @var ReturnResponse $returnResponse
     */
    public $returnResponse;

    /**
     * StatementController constructor.
     * @param IStatementRepository $statement
     */
    public function __construct(IStatementRepository $statement, IStatementFilterRepository $filter, ReturnResponse $returnResponse)
    {
        $this->statement = $statement;
        $this->filter = $filter;
        $this->returnResponse = $returnResponse;
    }

    /**
     * Show Activity Log List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getActivityLog()
    {
        $perPage = config('ilrs-config.RECORD_PER_PAGE');
        $page = 1;
        if(isset($_GET[self::PAGE]))
        {
            $page = ($_GET[self::PAGE]*$perPage)-($perPage-1);
        }
        $statements   = $this->statement->getLogs($perPage);
        return view('statement.activitylog', compact('statements', self::PAGE));
    }

    /**
     * Create new statement with input json data
     * @param Request $request
     * @return mixed
     */
    public function saveStatements(Request $request)
    {
        $IlrsObj = new IlrsCoreStatement();
        $data = $IlrsObj->getStatementInputs($request);
        $inputs = array();
        $inputs[self::STATEMENT] = $data;
        $content = $data['id'];
        $this->statement->create($inputs);
        $location = config('ilrs-config.BASE_XAPI_URL').'/'.config('ilrs-routename.STATEMENT').'?statementId='.$content;
        $headers[self::LOCATION] =  $location;
        $contentJsonData[] = $content;
        return $this->returnResponse->jsonResponse($contentJsonData, 201, '', $headers);
    }

    /**
     * Fetch statement record by _id and Display statement on UI
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $statement    =   $this->statement->find($id);
        return view('statement.show', $statement->toArray());
        //return Response::json($statement, 200, array(), JSON_PRETTY_PRINT);
    }

    /**
     * Filter statements with input parameter and return matching records in JSON format
     * @param Request $request
     * @return mixed
     */
    public function getStatementDetailsByFilter(Request $request)
    {
        $filters = $request::all();
        $invalidParamMessage = "One of the query parameters specified in the request URI is not supported";

        /**
         * Added condition for AGENT to prepend mailto: in the value so user can search record with email address
         */
        if(array_key_exists(IStatementFilterRepository::AGENT, $filters)) {
            $filters[IStatementFilterRepository::AGENT] = "mailto:".$filters[IStatementFilterRepository::AGENT];
        }

        /**
         * Check all the query string parameter whether they are valid filter parameter or not
         */
        if (!$this->validateFilterKeys($filters)) {
            return $this->returnResponse->jsonResponse('', 400, $invalidParamMessage);
        }

        /**
         * As per xAPI standards STATEMENT_ID and VOIDED_STATE_ID are not allowed to search together
         */
        if (array_key_exists(IStatementFilterRepository::STATEMENT_ID, $filters) && array_key_exists(IStatementFilterRepository::VOIDED_STATE_ID, $filters)) {
            return $this->returnResponse->jsonResponse('', 400, $invalidParamMessage);
        }

        /**
         * Not allow filter parameter if query string has (STATEMENT_ID Or VOIDED_STATE_ID) and (ATTACHMENTS or FORMAT)
         */
        if ((array_key_exists(IStatementFilterRepository::STATEMENT_ID, $filters) || array_key_exists(IStatementFilterRepository::VOIDED_STATE_ID, $filters)) && (array_key_exists(IStatementFilterRepository::ATTACHMENTS, $filters) || array_key_exists(IStatementFilterRepository::FORMAT, $filters))) {
            return $this->returnResponse->jsonResponse('', 400, $invalidParamMessage);
        }

        /**
         * Added some additional filter check for VOIDED_STATE_ID to check VOIDED field and STATEMENT_REF field
         */
        if (array_key_exists(IStatementFilterRepository::VOIDED_STATE_ID, $filters)) {
            $filters[IStatementFilterRepository::VOIDED] = IStatementFilterRepository::VOIDED;
            $filters[IStatementFilterRepository::STATEMENT_REF] = IStatementFilterRepository::STATEMENT_REF;
        }

        $filterStatements = $this->filter->filterBy($filters)->all();
        return $this->returnResponse->jsonResponse($filterStatements, 200, '');
    }

    /**
     * Update stateent by ID and handel the voided statement condition
     * if voided statement then update only VERB block
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateStatements(Request $request, $id)
    {
        $IlrsObj = new IlrsCoreStatement();
        $data = $IlrsObj->getStatementInputs($request);
        $updateField = self::STATEMENT;
        return $this->statement->update($id, $updateField, $data);
    }

    /**
     * Validate filter keys, if query parameters are not valid the through error
     * @param $filters
     * @return bool
     */
    public function validateFilterKeys($filters)
    {
        foreach($filters as $field => $value)
        {
            if(!in_array($field, $this->filter->validFilterableFields)) {
                return false;
                break;
            }
        }
        return true;
    }
}
