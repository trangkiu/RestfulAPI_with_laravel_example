<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use  Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {


        if($request->expectsJson()){
          // create exception if the product is not found
          if($exception instanceof ModelNotFoundException){
            //return response('Model not found',404);
            return response()->json([
              'errors' => 'Model not found'
            ], Response::HTTP_NOT_FOUND);
          }


          // create exception for incorrect route
          if($exception instanceof NotFoundHttpException)
          return response()->json([
            'errors' => 'incorrect route '
          ], Response::HTTP_NOT_FOUND);
        }




        return parent::render($request, $exception);
    }
}
