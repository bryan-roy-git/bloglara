<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use App\Traits\ApiResponse;
use Mockery\Exception\InvalidOrderException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponse;
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

        $this->renderable(function (Exception $e, $request) {
            // dd($e);

            // Como saber en que ambiente estamos ENV o PROD meidan la KEY

            if ( env('APP_ENV') == 'local' ) {
                return parent::report($e);
            }
    
            if ( $e->getPrevious() instanceof ModelNotFoundException ) { // instanceof => nos dice si es una istancia
                return $this->errorResponse("Recurso no encontrada", $code = 404, $msj = "Recurso no encontrada");
            } 

            if ( $e instanceof NotFoundHttpException ) {
                return $this->errorResponse("Pagina no encontrada", $code = 404, $msj = "Pagina no encontrada");
            }

            // return parent::render($request, $e);

        });


    }
}
