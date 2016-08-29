<?php

namespace App\iLRS\Traits;

use Exception;
use Illuminate\Contracts\Validation\UnauthorizedException;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

trait RestExceptionHandlerTrait
{

    /**
     * Creates a new JSON response based on exception type.
     *
     * @param Request $request
     * @param Exception $e
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getJsonResponseForException(Request $request, Exception $e)
    {
        switch(true) {
            case $this->isModelNotFoundException($e):
                $retval = $this->modelNotFound();
                break;
            case $this->isEndPointException($e):
                $retval = $this->endPointNotFound();
                break;
            case $this->isMethodNotAllowed($e):
                $retval = $this->methodNotAllowed();
                break;
            default:
                $retval = $this->badRequest($e->getMessage(),$e->getCode());
        }

        return $retval;
    }

    /**
     * Returns json response for generic bad request.
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function badRequest($message='Bad request', $statusCode=400)
    {
        return $this->jsonResponse(['status code'=>$statusCode,'error' => $message], $statusCode);
    }

    /**
     * Returns json response for Eloquent model not found exception.
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function modelNotFound($message='Record not found', $statusCode=404)
    {
        return $this->jsonResponse(['status code'=>$statusCode,'error' => $message], $statusCode);
    }

    protected function endPointNotFound($message='End Point not found',$statusCode=404)
    {
        return $this->jsonResponse(['status code'=>$statusCode,'error'=> $message],$statusCode);
    }

    protected function methodNotAllowed($message='Unauthorized Action',$statusCode=403)
    {
        return $this->jsonResponse(['status code'=>$statusCode,'error'=>$message],$statusCode);
    }

    /**
     * Returns json response.
     *
     * @param array|null $payload
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResponse(array $payload=null, $statusCode=404)
    {
        $payload = $payload ?: [];

        //return response()->json($payload, $statusCode);

        return response()->json($payload, $statusCode)
                        ->header('status code',$statusCode);

    }

    /**
     * Determines if the given exception is an Eloquent model not found.
     *
     * @param Exception $e
     * @return bool
     */
    protected function isModelNotFoundException(Exception $e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function isEndPointException(Exception $e)
    {
        return $e instanceof NotFoundHttpException;
    }

    //Implement 403 - Unathorized Action
    protected function isMethodNotAllowed(Exception $e)
    {
        return $e instanceof MethodNotAllowedException;
    }

    protected function isUnauthroized(Exception $e)
    {

    }
    // Pending - Implement 401 - Unauthorize Error

    // Pending - Implement 500 - Internal Server Error (Developer Error)


}