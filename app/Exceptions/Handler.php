<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
        $this->reportable(
            function (Throwable $e) {
                //
            }
        );

        $this->renderable(
            function (Throwable $e) {
                $data = [
                    'success'   => 'false',
                    'exception' => get_class($e),
                    'message'   => $e->getMessage() ?? '',
                ];

                if ($e instanceof ValidationException) {
                    $data = $data + ['errors' => $e->errors() ?? ''];
                }

                return new JsonResponse($data, 500, options: JSON_UNESCAPED_SLASHES);
            }
        );
    }
}
