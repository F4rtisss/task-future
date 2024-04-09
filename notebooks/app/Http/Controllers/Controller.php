<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;

abstract class Controller
{
    /**
     * @param array $data
     * @return JsonResponse
     */
    protected function success(array $data = []): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    /**
     * @param string $message
     * @param array $errors
     * @return JsonResponse
     */
    protected function error(string $message, array $errors = []): JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => $errors,
            'error' => $message
        ]);
    }
}
