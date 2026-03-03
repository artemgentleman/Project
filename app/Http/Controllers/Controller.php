<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function tryMethod(callable $callback)
    {
        try {
            return callback();
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 401);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => "Register failed error",
            ], 401);
        }
    }
}
