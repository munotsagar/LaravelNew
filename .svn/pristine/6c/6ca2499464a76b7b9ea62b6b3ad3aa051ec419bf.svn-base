<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Request;

use Response;

use App\Models\Statement;

use Illuminate\Pagination\Paginator;

use Carbon\Carbon;

use App\Repository\Report\IReportRepository;

use App\Repository\Statement\IStatementRepository;

class ReportController  extends ApiBaseController
{
    /**
     * Report object to call report repository methods
     * @var $report
     */
    protected $report;

    /**
     * ReportsController constructor.
     * @param IReportRepository $report
     */
    public function __construct(IReportRepository $report)
    {
        $this->report = $report;
    }

    /**
     * Display Report List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showReportsCategory()
    {
        return view('reports.reportscategory');
    }

    /**
     * Display Report related to Launch Statistic
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLaunchStatistic()
    {
        $distinctField = "statement.actor.mbox";
        $fieldName = "statement.object.definition.name.en-US";
        $fieldValue  = "Video-Mode";
        $statementDistinctVideo = $this->report->findDistinctBy($distinctField, $fieldName, $fieldValue);
        $completionVideoCount = count($statementDistinctVideo);

        $fieldName = "statement.object.definition.name.en-US";
        $fieldValue  = "Text-Mode";
        $statementDistinctText = $this->report->findDistinctBy($distinctField, $fieldName, $fieldValue);
        $completionTextCount = count($statementDistinctText);

        return view('reports.statistic', compact('completionVideoCount', 'completionTextCount'));

    }

    /**
     * Display Report related to Course Completion
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCourseCompletion()
    {
        $distinctField = "statement.actor.mbox";
        $fieldName = "statement.result.completion";
        $fieldValue = true;
        $statementDistinceTrue = $this->report->findDistinctBy($distinctField, $fieldName, $fieldValue);
        $completionTrueCount = count($statementDistinceTrue);

        $fieldValue = false;
        $statementDistinceFalse =$this->report->findDistinctBy($distinctField, $fieldName, $fieldValue);
        $completionFalseCount = count($statementDistinceFalse);

        return view('reports.completion', compact('completionTrueCount', 'completionFalseCount'));
    }

    /**
     * Display Report related to Question Analysis
     * Not Developed yet
     */
    public function showQuestionAnalysis()
    {

    }

    /**
     * Display Report related to Module Analysis
     * @param IStatementRepository $statement
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function showModuleAnalysis(IStatementRepository $statement)
    {
        $fieldName = "statement.object.definition.name.en-US";
        $fieldValue = 'Threats Interactivity';
        $statementQ1Count = $statement->getCounByFieldNameAndValue($fieldName, $fieldValue);

        $fieldValue = 'What Is Information Security?';
        $statementQ2Count = $statement->getCounByFieldNameAndValue($fieldName, $fieldValue);

        return view('reports.moduleanalysis', compact('statementQ1Count', 'statementQ2Count'));
    }

}
