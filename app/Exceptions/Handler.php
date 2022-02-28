<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (ValidationException $e) {
            return response()->error($this->getErrorMessagges($e->validator->getMessageBag()), (int)422);
        });
        $this->renderable(function (AccessDeniedHttpException $e, $request) {
            return response()->error(['message' => 'Nemáte na to povolenia.'], (int)403);
        });
        // $this->renderable(function (HttpException $e, $request) {
        //     return response()->error(['message' => 'Nemáte na to povolenia.'],  (int)404);
        // });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            return response()->error(['message' => 'Žiadne výsledky pre model.'], (int)404);
        });
        $this->renderable(function (AuthenticationException  $e, $request) {
            return response()->error(['message' => 'Unauthenticated.'], (int)401);
        });
    }

    public function getErrorMessagges($errors)
    {
        $message = collect();
        $collection = collect($errors);
        $keys = $collection->keys();
        foreach ($keys as $key) {
            $message->put($key, $this->getByKey($collection[$key]));
        };
        return $message;
    }

    public function getByKey($array)
    {
        foreach ($array as $item) {
            return $item;
        }
    }
}
