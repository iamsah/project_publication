<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        if($this->isHttpException($exception)){
            $code = $exception->getStatusCode();
            $message = $exception->getMessage();
            switch ($code){
                case 401:
                    return \Response::view('errors.401',compact('message','code'),401);
                    break;
                case 403:
                    return \Response::view('errors.403',compact('message','code'),403);
                    break;
                case 404:
                    return \Response::view('errors.404',compact('message','code'),404);
                    break;
            }
        }  else {
            return parent::render($request, $exception);
        }
        return parent::render($request, $exception);
    }
}
