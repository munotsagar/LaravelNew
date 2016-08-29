<?php
namespace App\Repository\Filter;

interface IStatementFilterRepository
{
    /**
     * STATEMENT_ID constant contain statementId query string input parameter for filter
     */
    const STATEMENT_ID = "statementId";

    /**
     * VOIDED_STATE_ID constant contain voidedStatementId query string input parameter for filter
     */
    const VOIDED_STATE_ID = "voidedStatementId";

    /**
     * VOIDED constant contain voided query string input parameter for filter
     */
    const VOIDED = "voided";

    /**
     * AGENT constant contain agent query string input parameter for filter
     */
    const AGENT = "agent";

    /**
     * VERB constant contain verb query string input parameter for filter
     */
    const VERB = "verb";

    /**
     * ACTIVITY constant contain activity query string input parameter for filter
     */
    const ACTIVITY = "activity";

    /**
     * REGISTRATION constant contain registration query string input parameter for filter
     */
    const REGISTRATION = "registration";

    /**
     * REL_ACTIVITY constant contain related_activities query string input parameter for filter
     */
    const REL_ACTIVITY = "related_activities";

    /**
     * REL_AGENTS constant contain related_agents query string input parameter for filter
     */
    const REL_AGENTS = "related_agents";

    /**
     * SINCE constant contain since query string input parameter for filter
     */
    const SINCE = "since";

    /**
     * UNTIL constant contain until query string input parameter for filter
     */
    const UNTIL = "until";

    /**
     * LIMIT constant contain limit query string input parameter for filter
     */
    const LIMIT = "limit";

    /**
     * FORMAT constant contain format query string input parameter for filter
     */
    const FORMAT = "format";

    /**
     * ATTACHMENTS constant contain attachments query string input parameter for filter
     */
    const ATTACHMENTS = "attachments";

    /**
     * ASC_ORDER constant contain ascending query string input parameter for filter
     */
    const ASC_ORDER = "ascending";

    /**
     * STATEMENT_REF constant contain StatementRef query string input parameter for filter
     */
    const STATEMENT_REF = "StatementRef";
    /**
     * Filter and map db fileds with query string parameter
     * @param $filters
     * @return mixed
     */
    public function filterBy($filters);

    /**
     * Apply filter and return all filtered statements
     * @return mixed
     */
    public function all();
}