<?php

/*
|------------------------------------------------------------------
| General
|------------------------------------------------------------------
*/

Route::options('{all}', function(){
    return response('',204);
})->where('all', '.*');

/*
|------------------------------------------------------------------
| Lrs
|------------------------------------------------------------------
*/
/**
 * Save statement into the database by receiving data in json format
 */

Route::post('/xapi/statements', ['uses' => 'StatementController@saveStatements','middleware'=>'customauth']);

/**
 * Update statement data the database by receiving data in json format
 */

Route::put('/xapi/statements/{id}', ['uses' => 'StatementController@updateStatements','middleware'=>'customauth']);

/**
 * Fetch statement data by Filter parameter and return in json format
 */
Route::get('/xapi/statements', 'StatementController@getStatementDetailsByFilter');

/**
 * To See all the Activity List in Browser
 */
Route::get('/xapi/activitylog', 'StatementController@getActivityLog');

/**
 * Show json detail by click on the data displayed on Activity List page
 */
Route::get('/xapi/activitylog/{id}', 'StatementController@show');

/*
|------------------------------------------------------------------
| Reports
|------------------------------------------------------------------
*/
/**
 * Show reports category
 */
Route::get('/xapi/reports', 'ReportController@showReportsCategory');

/**
 * Show reports for Course Launch Statistic
 */
Route::get('/xapi/reports/completion', 'ReportController@showCourseCompletion');

/**
 * Show reports for Course completion
 */
Route::get('/xapi/reports/statistic', 'ReportController@showLaunchStatistic');

/**
 * Show reports for Question Analysis
 */
Route::get('/xapi/reports/analysis', 'ReportController@showQuestionAnalysis');

/**
 * Show reports for Module Analysis
 */
Route::get('/xapi/reports/moduleanalysis', 'ReportController@showModuleAnalysis');




/*
|------------------------------------------------------------------
| Internal
|------------------------------------------------------------------
*/