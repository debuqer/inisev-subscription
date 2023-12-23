<?php

namespace App\Exceptions;

use App\Http\Response\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {

        });

        $this->renderable(function (ValidationException $e, Request $request) {
            return App::make(Response::class)->fail($e->errors());
        });

        $this->renderable(function (HttpException $e, Request $request) {
            return App::make(Response::class)->fail([
                'message' => $e->getMessage(),
            ]);
        });
    }
}
