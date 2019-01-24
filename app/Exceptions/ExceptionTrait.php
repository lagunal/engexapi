<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;



Trait ExceptionTrait {

    public function apiException($request, $e) {

        if ($this->isHttp($e)) {
            return $this->HttpResponse($e);
        }

        return parent::render($request, $e);

    }


    protected function isHttp($e) {
        return $e instanceof NotFoundHttpException;
    }


    protected function HttpResponse($e) {
        return response()->json([
            'error' => 'Incorrect URL Route'
        ], Response::HTTP_NOT_FOUND);                
    }

}